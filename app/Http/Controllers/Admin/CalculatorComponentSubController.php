<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\Calculator\Component\Store as StoreCalculatorComponentRequest;
use App\Http\Requests\Admin\Calculator\Component\Update as UpdateCalculatorComponentRequest;

// Datatables
use App\DataTables\CalculatorComponentSubDataTable;
// Models
use App\Models\CalculatorComponent;

// Services
use App\Services\CalculatorComponentService;

class CalculatorComponentSubController extends Controller
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
    public function index($component_id, CalculatorComponentSubDataTable $dataTable)
    {
        $component = CalculatorComponent::findOrFail($component_id);
        $this->setData(['page' => ucfirst($component->title) . ' Sub Component - List', 'component_id' => $component_id]);
        return $dataTable->with('component_id', $component_id)->render('admin.calculator.component.sub.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($component_id)
    {
        $parent_component = CalculatorComponent::findOrFail($component_id);
        $this->setData(['page' => 'Create New Calculator Component Sub ' . $parent_component->title, 'parent_component' => $parent_component]);

        return view('admin.calculator.component.sub.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($component_id, StoreCalculatorComponentRequest $request, CalculatorComponentService $calculatorComponentService)
    {
        $calculator = $calculatorComponentService->create($request);

        return redirect(route('admin.calculator.component.sub.index', $component_id))->withSuccess('Sub Component created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalculatorComponent  $calculatorComponent
     * @return \Illuminate\Http\Response
     */
    public function show($component_id, $id)
    {
        $component = CalculatorComponent::findOrFail($id);
        $this->setData(['page' => 'Show Detail Calculator Component Sub ' . $component->ParentComponent->title, 'component' => $component]);

        return view('admin.calculator.component.sub.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalculatorComponent  $calculatorComponent
     * @return \Illuminate\Http\Response
     */
    public function edit($component_id, $id)
    {
        $component = CalculatorComponent::findOrFail($id);
        $parent_component = CalculatorComponent::findOrFail($component_id);

        $this->setData(["page" => 'Edit Calculator Component Sub ' . $parent_component->title, 'parent_component' => $parent_component, 'component' => $component]);
        return view('admin.calculator.component.sub.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalculatorComponent  $calculatorComponent
     * @return \Illuminate\Http\Response
     */
    public function update($component_id, UpdateCalculatorComponentRequest $request, $id, CalculatorComponentService $calculatorComponentService)
    {
        $component = $calculatorComponentService->update($request, $id);

        return redirect(route('admin.calculator.component.sub.index', $component_id))->withSuccess('Sub Component update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalculatorComponent  $calculatorComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy($component_id, $id)
    {
        $component = CalculatorComponent::findOrFail($id);

        $component->delete();

        return response()->json(["type" => 'success', "message" => 'Sub Component successfully deleted!'], 200);
    }
}
