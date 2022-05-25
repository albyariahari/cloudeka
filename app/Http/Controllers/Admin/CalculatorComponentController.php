<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\Calculator\Component\Store as StoreCalculatorComponentRequest;
use App\Http\Requests\Admin\Calculator\Component\Update as UpdateCalculatorComponentRequest;

// Datatables
use App\DataTables\CalculatorComponentDataTable;

// Models
use App\Models\CalculatorComponent;

// Services
use App\Services\CalculatorComponentService;

class CalculatorComponentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Create Calculator Component'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Calculator Component'])->only(['edit', 'update']);
        $this->middleware(['permission:Delete Calculator Component'])->only(['destroy']);
        $this->middleware(['permission:Show Calculator Component'])->only(['show']);

        $this->data = [
            'data_types' => [
                'string',
                'integer',
                'integer-free-input',
                'list',
                'boolean',
                'list-full',
                'list-item',
                'list-with-child',
                'server_name',
                'server_quantity',
                'commitment-type',
                'persistant-volume'
            ]
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CalculatorComponentDataTable $dataTable)
    {
        return $dataTable->render('admin.calculator.component.index', ['page' => 'Calculator Component - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData(['page' => 'Create New Calculator Component']);

        return view('admin.calculator.component.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalculatorComponentRequest $request, CalculatorComponentService $calculatorComponentService)
    {
        $calculator = $calculatorComponentService->create($request);

        return redirect(route('admin.calculator.component.index'))->withSuccess('Component created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalculatorComponent  $calculatorComponent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $component = CalculatorComponent::findOrFail($id);
        $this->setData(['page' => 'Show Detail Calculator Component', 'component' => $component]);

        return view('admin.calculator.component.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalculatorComponent  $calculatorComponent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = CalculatorComponent::findOrFail($id);

        $this->setData(["page" => 'Edit Calculator Component', 'component' => $component]);
        return view('admin.calculator.component.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalculatorComponent  $calculatorComponent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalculatorComponentRequest $request, $id, CalculatorComponentService $calculatorComponentService)
    {
        $component = $calculatorComponentService->update($request, $id);

        return redirect(route('admin.calculator.component.index'))->withSuccess('Component update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalculatorComponent  $calculatorComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $component = CalculatorComponent::findOrFail($id);

        $component->subComponents()->delete();
        $component->delete();

        return response()->json(["type" => 'success', "message" => 'Component successfully deleted!'], 200);
    }
}
