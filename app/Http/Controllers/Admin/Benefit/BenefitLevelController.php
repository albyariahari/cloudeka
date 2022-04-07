<?php

namespace App\Http\Controllers\Admin\Benefit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

// Datatable
use App\DataTables\Benefit\BenefitLevelDataTable;

// Request(s)
use App\Http\Requests\Admin\Benefit\Level\Store as BenefitLevelStoreRequest;
use App\Http\Requests\Admin\Benefit\Level\Update as BenefitLevelUpdateeRequest;

// Service(s)
use App\Services\Benefit\BenefitLevelService;

class BenefitLevelController extends Controller {
    private $__benefitLevelService = null;
	private $__back;
	
	public function __construct(BenefitLevelService $benefitLevelService, Request $req) {
        $this->middleware([ 'permission:Create Benefit Level' ])->only([ 'create', 'store' ]);
        $this->middleware([ 'permission:Edit Benefit Level' ])->only([ 'edit', 'update' ]);
        $this->middleware([ 'permission:Show Benefit Level' ])->only([ 'show' ]);
        $this->middleware([ 'permission:Delete Benefit Level' ])->only([ 'destroy' ]);
		
		$this->__benefitLevelService = $benefitLevelService;
		$this->__back = route('admin.benefits.levels.index');
	}
	
	public function index(BenefitLevelDataTable $dataTable, Request $req) {
        return $dataTable->with($req->all())->render('admin.benefits.levels.index', [
			'page' => 'Benefit Levels - Index', 
		]);
	}
	
	public function create() {
        return view('admin.benefits.levels.create', [
			'page' => 'Benefit Levels - Create', 
			'save' => route('admin.benefits.levels.store'), 
			'back' => $this->__back, 
		]);
	}
	
	public function store(BenefitLevelStoreRequest $req) {
        if (!$this->__benefitLevelService->Create($req->all()))
			return redirect(route('admin.benefits.levels.create'))->withError('Can\'t create Data!');
		else
			return redirect($this->__back)->withSuccess('Data created!');
	}
	
	public function edit($id) {
        return view('admin.benefits.levels.edit', [
			'page' => 'Benefit Levels - Edit', 
			'data' => $this->__benefitLevelService->Find($id), 
			'save' => route('admin.benefits.levels.update', [ $id ]), 
			'back' => $this->__back, 
		]);
	}
	
	public function Update(BenefitLevelUpdateeRequest $req, $id) {
        if (!$this->__benefitLevelService->Update($id, $req->all()))
			return redirect(route('admin.benefits.levels.edit', [ $id ]))->withError('Can\'t update Data!');
		else
			return redirect($this->__back)->withSuccess('Data updated!');
	}
	
	public function show($id) {
        return view('admin.benefits.levels.show', [
			'page' => 'Benefit Levels - Show', 
			'data' => $this->__benefitLevelService->Find($id), 
			'back' => $this->__back, 
		]);
	}
	
	public function destroy($id) {
        if (!$this->__benefitLevelService->Delete($id))
            return Response::json(['type' => 'error', 'message' => 'Can\'t delete data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data deleted!'], 200);
	}
	
	public function move($id, $move = 0) {
        if (!$this->__benefitLevelService->Move($id, $move))
            return Response::json(['type' => 'error', 'message' => 'Can\'t move data '.((int) $move === 0 ? 'up' : 'down').'!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data moved '.((int) $move === 0 ? 'up' : 'down').'!'], 200);
	}
	
	public function toggle($id, $toggle = 0) {
        if (!$this->__benefitLevelService->Toggle($id, $toggle))
            return Response::json(['type' => 'error', 'message' => 'Can\'t '.((int) $toggle === 0 ? 'deactivate' : 'activate').' Data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data '.((int) $toggle === 0 ? 'deactivate' : 'activate').'d!'], 200);
	}
}