<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

// Datatable
use App\DataTables\SolutionInterestDataTable;

// Request(s)
use App\Http\Requests\Admin\SolutionInterest\Store as SolutionInterestStoreRequest;
use App\Http\Requests\Admin\SolutionInterest\Update as SolutionInterestUpdateRequest;

// Service(s)
use App\Services\SolutionInterestService;

class SolutionInterestController extends Controller
{
    private $__solutionInterestService = null;
	
	public function __construct(SolutionInterestService $solutionInterestService, Request $req) {
        $this->middleware(['permission:Create Partnership Type'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Partnership Type'])->only(['edit', 'update']);
        $this->middleware(['permission:Show Partnership Type'])->only(['show']);
        $this->middleware(['permission:Delete Partnership Type'])->only(['destroy']);
		
		$this->__solutionInterestService = $solutionInterestService;
	}
	
	public function index(SolutionInterestDataTable $dataTable, Request $req) {
        return $dataTable->with([
			'date_from' => $req->date_from, 
			'date_to' => $req->date_to, 
			'is_active' => $req->is_active, 
		])->render('admin.solution-interests.index', [
			'page' => 'Solution Interests - Index', 
		]);
	}
	
	public function create() {
        return view('admin.solution-interests.create', [
			'page' => 'Solution Interests - Create', 
			'save' => route('admin.join-programs.solution-interests.store'), 
			'back' => route('admin.join-programs.solution-interests.index'), 
		]);
	}
	
	public function store(SolutionInterestStoreRequest $req) {
        if (!$this->__solutionInterestService->Create($req->all()))
			return redirect(route('admin.join-programs.solution-interests.create'))->withError('Can\'t create Data!');
		else
			return redirect(route('admin.join-programs.solution-interests.index'))->withSuccess('Data created!');
	}
	
	public function edit($id) {
        return view('admin.solution-interests.edit', [
			'page' => 'Solution Interests - Edit', 
			'data' => $this->__solutionInterestService->Find($id), 
			'save' => route('admin.join-programs.solution-interests.update', [$id]), 
			'back' => route('admin.join-programs.solution-interests.index'), 
		]);
	}
	
	public function Update(SolutionInterestUpdateRequest $req, $id) {
        if (!$this->__solutionInterestService->Update($id, $req->all()))
			return redirect(route('admin.join-programs.solution-interests.edit', [$id]))->withError('Can\'t update Data!');
		else
			return redirect(route('admin.join-programs.solution-interests.index'))->withSuccess('Data updated!');
	}
	
	public function show($id) {
        return view('admin.solution-interests.show', [
			'page' => 'Solution Interests - Show', 
			'data' => $this->__solutionInterestService->Find($id), 
			'back' => route('admin.join-programs.solution-interests.index'), 
		]);
	}
	
	public function destroy($id) {
        if (!$this->__solutionInterestService->Delete($id))
            return Response::json(['type' => 'error', 'message' => 'Can\'t delete data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data deleted!'], 200);
	}
	
	public function move($id, $move = 0) {
        if (!$this->__solutionInterestService->Move($id, $move))
            return Response::json(['type' => 'error', 'message' => 'Can\'t move data '.((int) $move === 0 ? 'up' : 'down').'!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data moved '.((int) $move === 0 ? 'up' : 'down').'!'], 200);
	}
	
	public function toggle($id, $toggle = 0) {
        if (!$this->__solutionInterestService->Toggle($id, $toggle))
            return Response::json(['type' => 'error', 'message' => 'Can\'t '.((int) $toggle === 0 ? 'deactivate' : 'activate').' Data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data '.((int) $toggle === 0 ? 'deactivate' : 'activate').'d!'], 200);
	}
}
