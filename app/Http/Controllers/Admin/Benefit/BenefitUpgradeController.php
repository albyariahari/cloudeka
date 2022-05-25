<?php

namespace App\Http\Controllers\Admin\Benefit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

// Datatable
use App\DataTables\Benefit\BenefitUpgradeDataTable;

// Request(s)
use App\Http\Requests\Admin\Benefit\Upgrade\Store as BenefitUpgradeStoreRequest;
use App\Http\Requests\Admin\Benefit\Upgrade\Update as BenefitUpgradeUpdateRequest;

// Service(s)
use App\Services\Benefit\BenefitCategoryService;
use App\Services\Benefit\BenefitLevelService;
use App\Services\Benefit\BenefitUpgradeService;

class BenefitUpgradeController extends Controller {
    private $__benefitCategoryService = null;
    private $__benefitLevelService = null;
    private $__benefitUpgradeService = null;
	private $__back;
	private $__category;
	private $__levels;
	
	public function __construct(
		BenefitCategoryService $benefitCategoryService, 
		BenefitLevelService $benefitLevelService, 
		BenefitUpgradeService $benefitUpgradeService, 
		Request $req
	) {
        $this->middleware([ 'permission:Create Benefit Upgrade' ])->only([ 'create', 'store' ]);
        $this->middleware([ 'permission:Edit Benefit Upgrade' ])->only([ 'edit', 'update' ]);
        $this->middleware([ 'permission:Show Benefit Upgrade' ])->only([ 'show' ]);
        $this->middleware([ 'permission:Delete Benefit Upgrade' ])->only([ 'destroy' ]);
		
		$this->__benefitCategoryService = $benefitCategoryService;
		$this->__benefitLevelService = $benefitLevelService;
		$this->__benefitUpgradeService = $benefitUpgradeService;
		$this->__category = $this->__benefitCategoryService->Find($req->route('id'));
		$this->__levels = $this->__benefitLevelService->Pluck();
		$this->__back = route('admin.benefits.upgrades.index', [ $this->__category->code, $this->__category->id ]);
	}
	
	public function index(BenefitUpgradeDataTable $dataTable, Request $req) {
        return $dataTable->with($req->all() + $req->route()->parameters())->render('admin.benefits.upgrades.index', [
			'page' => 'Benefit Upgrades - Index', 
		]);
	}
	
	public function create($code) {
        return view('admin.benefits.upgrades.create', [
			'page' => 'Benefit Upgrades - Create', 
			'save' => route('admin.benefits.upgrades.store', [ $code, $this->__category->id ]), 
			'back' => $this->__back, 
			'levels' => $this->__levels, 
		]);
	}
	
	public function store(BenefitUpgradeStoreRequest $req, $code) {
        if (!$this->__benefitUpgradeService->Create($this->__category->id, $req->all()))
			return redirect(route('admin.benefits.upgrades.create', [ $code, $this->__category->id ]))->withError('Can\'t create Data!');
		else
			return redirect($this->__back)->withSuccess('Data created!');
	}
	
	public function edit($code, $categoryId, $id) {
        return view('admin.benefits.upgrades.edit', [
			'page' => 'Benefit Upgrades - Edit', 
			'data' => $this->__benefitUpgradeService->Find($id), 
			'save' => route('admin.benefits.upgrades.update', [ $code, $categoryId, $id ]), 
			'back' => $this->__back, 
			'levels' => $this->__levels, 
		]);
	}
	
	public function Update(BenefitUpgradeUpdateRequest $req, $code, $categoryId, $id) {
        if (!$this->__benefitUpgradeService->Update($id, $req->all()))
			return redirect(route('admin.benefits.upgrades.edit', [ $this->__category->id, $id ]))->withError('Can\'t update Data!');
		else
			return redirect($this->__back)->withSuccess('Data updated!');
	}
	
	public function show($code, $categoryId, $id) {
        return view('admin.benefits.upgrades.show', [
			'page' => 'Benefit Upgrades - Show', 
			'data' => $this->__benefitUpgradeService->Find($id), 
			'back' => $this->__back, 
		]);
	}
	
	public function destroy($code, $categoryId, $id) {
        if (!$this->__benefitUpgradeService->Delete($id))
            return Response::json(['type' => 'error', 'message' => 'Can\'t delete data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data deleted!'], 200);
	}
	
	public function move($code, $categoryId, $id, $move = 0) {
        if (!$this->__benefitUpgradeService->Move($categoryId, $id, $move))
            return Response::json(['type' => 'error', 'message' => 'Can\'t move data '.((int) $move === 0 ? 'up' : 'down').'!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data moved '.((int) $move === 0 ? 'up' : 'down').'!'], 200);
	}
	
	public function toggle($code, $categoryId, $id, $toggle = 0) {
        if (!$this->__benefitUpgradeService->Toggle($id, $toggle))
            return Response::json(['type' => 'error', 'message' => 'Can\'t '.((int) $toggle === 0 ? 'deactivate' : 'activate').' Data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data '.((int) $toggle === 0 ? 'deactivate' : 'activate').'d!'], 200);
	}
}