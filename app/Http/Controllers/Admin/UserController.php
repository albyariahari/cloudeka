<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use DB;
// Datatables

// Request
use App\Http\Requests\Admin\User\Store as StoreUserRequest;

// Models
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Create User'])->only(['create', 'store']);
        $this->middleware(['permission:Edit User'])->only(['edit', 'update']);
        $this->middleware(['permission:Delete User'])->only(['destroy']);
        $this->middleware(['permission:Show User'])->only(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserDataTable $dataTable)
    {
        $role = Role::get();
        $role_id = $request->get('role_id', 0);

        return $dataTable->with('role_id', $role_id)->render('admin.user.index', ['page' => 'User - List', 'role' => $role, 'role_id' => $role_id]);
    }

    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $user = User::where(function ($query) use ($term) {
            $query->where('email', 'like', '%@%')
                ->orWhereRaw("name like ?", ["%{$term}%"]);
        })
            ->limit(6)->get();

        $formatted_tags = [];

        foreach ($user as $user) {
            $formatted_tags[] = ['id' => $user->id, 'text' => $user->name . ' - ' . $user->email];
        }

        return response()->json($formatted_tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();

        $this->setData(["page" => 'Create New User', 'roles' => $roles]);
        return view('admin.user.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = $request->input();
        $input['password'] = Hash::make($input['password']);

        if ($request->has('profile_picture')) {
            $input['profile_picture'] = $request->profile_picture->store('profile', 'public');
        }

        DB::transaction(function () use ($input) {
            $user = User::create($input);
            $user->assignRole($input['roles']);
        });

        return redirect(route('admin.user.index'))->withSuccess('User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $this->setData(["page" => 'Show Detail User', 'user' => $user]);
        return view('admin.user.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();

        $this->setData(["page" => 'Edit User', 'roles' => $roles, 'user' => $user]);
        return view('admin.user.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->input();

        if (!empty($input['password']) && $input['password'] !== null) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input['password'] = $user->password;
        }
        if ($request->has('profile_picture')) {
            \Storage::delete([$user->profile_picture]);
            $input['profile_picture'] = $request->profile_picture->store('profile', 'public');
        }
        DB::transaction(function () use ($input, $user, $id) {
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();

            $user->assignRole($input['roles']);
        });

        return redirect(route('admin.user.index'))->withSuccess('User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
		
		if ($user->profile_picture)
			\Storage::delete([$user->profile_picture]);
		
        $user->delete();

        return response()->json(["type" => 'success', "message" => 'User successfully deleted!'], 200);
    }
}
