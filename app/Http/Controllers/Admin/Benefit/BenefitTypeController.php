<?php

namespace App\Http\Controllers\Admin\Benefit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

// Datatable
use App\DataTables\Benefit\BenefitTypeDataTable;

// Request(s)
use App\Http\Requests\Admin\Benefit\Type\Store as BenefitTypeStoreRequest;
use App\Http\Requests\Admin\Benefit\Type\Update as BenefitTypeUpdateRequest;

// Service(s)
use App\Services\Benefit\BenefitTypeService;

class BenefitTypeController extends Controller {
    private $__benefitTypeService = null;
	private $__back;
	
	public function __construct(BenefitTypeService $benefitTypeService, Request $req) {
        $this->middleware([ 'permission:Create Benefit Type' ])->only([ 'create', 'store' ]);
        $this->middleware([ 'permission:Edit Benefit Type' ])->only([ 'edit', 'update' ]);
        $this->middleware([ 'permission:Show Benefit Type' ])->only([ 'show' ]);
        $this->middleware([ 'permission:Delete Benefit Type' ])->only([ 'destroy' ]);
		
		$this->__benefitTypeService = $benefitTypeService;
		$this->__back = route('admin.benefits.types.index');
	}
	
	public function index(BenefitTypeDataTable $dataTable, Request $req) {
        return $dataTable->with($req->all())->render('admin.benefits.types.index', [
			'page' => 'Benefit Types - Index', 
		]);
	}
	
	public function create() {
        return view('admin.benefits.types.create', [
			'page' => 'Benefit Types - Create', 
			'save' => route('admin.benefits.types.store'), 
			'back' => $this->__back, 
		]);
	}
	
	public function store(BenefitTypeStoreRequest $req) {
        if (!$this->__benefitTypeService->Create($req->all()))
			return redirect(route('admin.benefits.types.create'))->withError('Can\'t create Data!');
		else
			return redirect($this->__back)->withSuccess('Data created!');
	}
	
	public function edit($id) {
        return view('admin.benefits.types.edit', [
			'page' => 'Benefit Types - Edit', 
			'data' => $this->__benefitTypeService->Find($id), 
			'save' => route('admin.benefits.types.update', [ $id ]), 
			'back' => $this->__back, 
		]);
	}
	
	public function Update(BenefitTypeUpdateRequest $req, $id) {
        if (!$this->__benefitTypeService->Update($id, $req->all()))
			return redirect(route('admin.benefits.types.edit', [ $id ]))->withError('Can\'t update Data!');
		else
			return redirect($this->__back)->withSuccess('Data updated!');
	}
	
	public function show($id) {
        return view('admin.benefits.types.show', [
			'page' => 'Benefit Types - Show', 
			'data' => $this->__benefitTypeService->Find($id), 
			'back' => $this->__back, 
		]);
	}
	
	public function destroy($id) {
        if (!$this->__benefitTypeService->Delete($id))
            return Response::json(['type' => 'error', 'message' => 'Can\'t delete data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data deleted!'], 200);
	}
	
	public function move($id, $move = 0) {
        if (!$this->__benefitTypeService->Move($id, $move))
            return Response::json(['type' => 'error', 'message' => 'Can\'t move data '.((int) $move === 0 ? 'up' : 'down').'!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data moved '.((int) $move === 0 ? 'up' : 'down').'!'], 200);
	}
	
	public function toggle($id, $toggle = 0) {
        if (!$this->__benefitTypeService->Toggle($id, $toggle))
            return Response::json(['type' => 'error', 'message' => 'Can\'t '.((int) $toggle === 0 ? 'deactivate' : 'activate').' Data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data '.((int) $toggle === 0 ? 'deactivate' : 'activate').'d!'], 200);
	}
}