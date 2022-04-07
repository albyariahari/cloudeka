<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;

// Requests
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Role\Store as StoreRoleRequest;
use App\Http\Requests\Admin\Role\Update as UpdateRoleRequest;

// Datatables
use App\DataTables\RoleDataTable;

// Models
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Super Admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('admin.role.index', ['page' => 'Role - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();

        $this->setData(["page" => 'Create New Roles', 'permission' => $permission]);
        return view('admin.role.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $input = $request->input();

        DB::transaction(function () use ($input) {
            $role = Role::create(['name' => $input['name']]);
            $role->syncPermissions($input['permission']);
        });

        return redirect(route('admin.role.index'))->withSuccess('Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        $this->setData(["page" => 'Show Detail Role', 'role' => $role]);
        return view('admin.role.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();

        $this->setData(["page" => 'Edit Roles', 'permission' => $permission, 'role' => $role]);
        return view('admin.role.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $input = $request->input();

        DB::transaction(function () use ($input, $id) {
            $role = Role::findOrFail($id);
            $role->update(['name' => $input['name']]);
            $role->syncPermissions($input['permission']);
        });

        return redirect(route('admin.role.index'))->withSuccess('Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return response()->json(["type" => 'success', "message" => 'Role successfully deleted!'], 200);
    }
}
