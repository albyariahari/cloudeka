<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\Calculator\Store as StoreCalculatorRequest;
use App\Http\Requests\Admin\Calculator\Update as UpdateCalculatorRequest;

// Datatables
use App\DataTables\CalculatorDataTable;

// models
use App\Models\Package;
use App\Models\Product;
use App\Models\Calculator;
use App\Models\CalculatorComponent;
use App\Services\CalculatorService;

class CalculatorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Create Calculator'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Calculator'])->only(['edit', 'update']);
        $this->middleware(['permission:Delete Calculator'])->only(['destroy']);
        $this->middleware(['permission:Show Calculator'])->only(['show']);

        $products = Product::all();
        $components = CalculatorComponent::with(['parentComponent'])->get();

        $this->setData(['products' => $products, 'components' => $components]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CalculatorDataTable $dataTable)
    {
        return $dataTable->render('admin.calculator.index', ['page' => 'Calculator - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData(['page' => 'Create New Calculator']);

        return view('admin.calculator.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalculatorRequest $request, CalculatorService $calculatorService)
    {
        $calculator = $calculatorService->create($request);

        return redirect(route('admin.calculator.index'))->withSuccess('Calculator created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calculator  $calculator
     * @return \Illuminate\Http\Response
     */
    public function show(Calculator $calculator)
    {
        $this->setData(['page' => 'Show Calculator', 'calculator' => $calculator]);

        return view('admin.calculator.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calculator  $calculator
     * @return \Illuminate\Http\Response
     */
    public function edit(Calculator $calculator)
    {
        $this->setData(['page' => 'Edit Calculator', 'calculator' => $calculator]);

        return view('admin.calculator.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calculator  $calculator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalculatorRequest $request, $id, CalculatorService $calculatorService)
    {
        $component = $calculatorService->update($request, $id);

        return redirect(route('admin.calculator.index'))->withSuccess('Calculator update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calculator  $calculator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calculator $calculator)
    {
        $calculator->delete();

        return response()->json(["type" => 'success', "message" => 'Calculator successfully deleted!'], 200);
    }
}
