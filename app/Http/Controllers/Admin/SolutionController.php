<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\Solution\Store as StoreSolutionRequest;
use App\Http\Requests\Admin\Solution\Update as UpdateSolutionRequest;

// Datatables
use App\DataTables\SolutionDataTable;

// Models
use App\Models\Client;
use App\Models\Product;
use App\Models\Solution;
use App\Models\UseCase;

// Services
use App\Services\SolutionService;

class SolutionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Create Solution'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Solution'])->only(['edit', 'update']);
        $this->middleware(['permission:Delete Solution'])->only(['destroy']);
        $this->middleware(['permission:Show Solution'])->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SolutionDataTable $dataTable)
    {
        return $dataTable->render('admin.solution.index', ['page' => 'Solution - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $useCases = UseCase::all();
        $products = Product::all();
        $clients = Client::all();

        $this->setData(['page' => 'Create New Solution', 'products' => $products, 'use_cases' => $useCases, 'clients' => $clients]);
        return view('admin.solution.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSolutionRequest $request, SolutionService $solutionService)
    {
        $solution = $solutionService->create($request);

        return redirect(route('admin.solution.index'))->withSuccess('Solution created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Solution $solution)
    {
        $this->setData(["page" => 'Show Detail Solution', 'solution' => $solution, 'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en')), 'languages' => languages()]);
        return view('admin.solution.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $solution = Solution::findOrFail($id);
        $useCases = UseCase::all();
        $clients = Client::all();
        $products = Product::all();
        $languages = languages();

        $this->setData(["page" => 'Edit Solution', 'solution' => $solution, 'use_cases' => $useCases, 'clients' => $clients, 'products' => $products, 'languages' => $languages, 'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en'))]);
        return view('admin.solution.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSolutionRequest $request, $id, SolutionService $solutionService)
    {
        $product = $solutionService->update($request, $id);

        return redirect(route('admin.solution.index'))->withSuccess('Solution update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solution $solution)
    {
        $solution->delete();

        return response()->json(["type" => 'success', "message" => 'Solution successfully deleted!'], 200);
    }
}
