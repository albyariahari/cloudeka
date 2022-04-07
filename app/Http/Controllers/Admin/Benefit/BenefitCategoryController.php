<?php

namespace App\Http\Controllers\Admin\Benefit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

// Datatable
use App\DataTables\Benefit\BenefitCategoryDataTable;

// Request(s)
use App\Http\Requests\Admin\Benefit\Category\Store as BenefitCategoryStoreRequest;
use App\Http\Requests\Admin\Benefit\Category\Update as BenefitCategoryUpdateRequest;

// Service(s)
use App\Services\Benefit\BenefitTypeService;
use App\Services\Benefit\BenefitCategoryService;

class BenefitCategoryController extends Controller {
    private $__benefitTypeService = null;
    private $__benefitCategoryService = null;
	private $__back;
	private $__type;
	private $__types;
	
	public function __construct(
		BenefitTypeService $benefitTypeService, 
		BenefitCategoryService $benefitCategoryService, 
		Request $req
	) {
        $this->middleware([ 'permission:Create Benefit Category' ])->only([ 'create', 'store' ]);
        $this->middleware([ 'permission:Edit Benefit Category' ])->only([ 'edit', 'update' ]);
        $this->middleware([ 'permission:Show Benefit Category' ])->only([ 'show' ]);
        $this->middleware([ 'permission:Delete Benefit Category' ])->only([ 'destroy' ]);
		
		$this->__benefitTypeService = $benefitTypeService;
		$this->__benefitCategoryService = $benefitCategoryService;
		$this->__type = $this->__benefitTypeService->FindByCode($req->route('code'));
		$this->__back = route('admin.benefits.categories.index', [ $this->__type->code ]);
	}
	
	public function index(BenefitCategoryDataTable $dataTable, Request $req) {
        return $dataTable->with($req->route()->parameters() + $req->all())->render('admin.benefits.categories.index', [
			'page' => 'Benefit Categories - Index', 
		]);
	}
	
	public function create() {
        return view('admin.benefits.categories.create', [
			'page' => 'Benefit Categories - Create', 
			'save' => route('admin.benefits.categories.store', [ $this->__type->code ]), 
			'back' => $this->__back, 
			'type_id' => $this->__type->id, 
		]);
	}
	
	public function store(BenefitCategoryStoreRequest $req, $code) {
        if (!$this->__benefitCategoryService->Create($code, $req->all()))
			return redirect(route('admin.benefits.categories.create', [ $code ]))->withError('Can\'t create Data!');
		else
			return redirect($this->__back)->withSuccess('Data created!');
	}
	
	public function edit($code, $id) {
        return view('admin.benefits.categories.edit', [
			'page' => 'Benefit Categories - Edit', 
			'data' => $this->__benefitCategoryService->Find($id), 
			'save' => route('admin.benefits.categories.update', [ $code, $id ]), 
			'back' => $this->__back, 
		]);
	}
	
	public function Update(BenefitCategoryUpdateRequest $req, $code, $id) {
        if (!$this->__benefitCategoryService->Update($id, $req->all()))
			return redirect(route('admin.benefits.categories.edit', [ $code, $id ]))->withError('Can\'t update Data!');
		else
			return redirect($this->__back)->withSuccess('Data updated!');
	}
	
	public function show($code, $id) {
        return view('admin.benefits.categories.show', [
			'page' => 'Benefit Categories - Show', 
			'data' => $this->__benefitCategoryService->Find($id), 
			'back' => $this->__back, 
		]);
	}
	
	public function destroy($code, $id) {
        if (!$this->__benefitCategoryService->Delete($id))
            return Response::json(['type' => 'error', 'message' => 'Can\'t delete data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data deleted!'], 200);
	}
	
	public function move($code, $id, $move = 0) {
        if (!$this->__benefitCategoryService->Move($this->__type->id, $id, $move))
            return Response::json(['type' => 'error', 'message' => 'Can\'t move data '.((int) $move === 0 ? 'up' : 'down').'!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data moved '.((int) $move === 0 ? 'up' : 'down').'!'], 200);
	}
	
	public function toggle($code, $id, $toggle = 0) {
        if (!$this->__benefitCategoryService->Toggle($id, $toggle))
            return Response::json(['type' => 'error', 'message' => 'Can\'t '.((int) $toggle === 0 ? 'deactivate' : 'activate').' Data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data '.((int) $toggle === 0 ? 'deactivate' : 'activate').'d!'], 200);
	}
}