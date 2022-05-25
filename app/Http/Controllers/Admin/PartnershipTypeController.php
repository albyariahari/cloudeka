<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

// Datatable
use App\DataTables\PartnershipTypeDataTable;

// Request(s)
use App\Http\Requests\Admin\PartnershipType\Store as PartnershipTypeStoreRequest;
use App\Http\Requests\Admin\PartnershipType\Update as PartnershipTypeUpdateRequest;

// Service(s)
use App\Services\PartnershipTypeService;

class PartnershipTypeController extends Controller
{
    private $__partnershipTypeService = null;
	
	public function __construct(PartnershipTypeService $partnershipTypeService, Request $req) {
        $this->middleware(['permission:Create Partnership Type'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Partnership Type'])->only(['edit', 'update']);
        $this->middleware(['permission:Show Partnership Type'])->only(['show']);
        $this->middleware(['permission:Delete Partnership Type'])->only(['destroy']);
		
		$this->__partnershipTypeService = $partnershipTypeService;
	}
	
	public function index(PartnershipTypeDataTable $dataTable) {
        return $dataTable->render('admin.partnership-types.index', [
			'page' => 'Partnership Types - Index', 
		]);
	}
	
	public function create() {
        return view('admin.partnership-types.create', [
			'page' => 'Partnership Types - Create', 
			'save' => route('admin.join-programs.partnership-types.store'), 
			'back' => route('admin.join-programs.partnership-types.index'), 
		]);
	}
	
	public function store(PartnershipTypeStoreRequest $req) {
        if (!$this->__partnershipTypeService->Create($req->all()))
			return redirect(route('admin.join-programs.partnership-types.create'))->withError('Can\'t create Data!');
		else
			return redirect(route('admin.join-programs.partnership-types.index'))->withSuccess('Data created!');
	}
	
	public function edit($id) {
        return view('admin.partnership-types.edit', [
			'page' => 'Partnership Types - Edit', 
			'data' => $this->__partnershipTypeService->Find($id), 
			'save' => route('admin.join-programs.partnership-types.update', [$id]), 
			'back' => route('admin.join-programs.partnership-types.index'), 
		]);
	}
	
	public function Update(PartnershipTypeUpdateRequest $req, $id) {
        if (!$this->__partnershipTypeService->Update($id, $req->all()))
			return redirect(route('admin.join-programs.partnership-types.edit', [$id]))->withError('Can\'t update Data!');
		else
			return redirect(route('admin.join-programs.partnership-types.index'))->withSuccess('Data updated!');
	}
	
	public function show($id) {
        return view('admin.partnership-types.show', [
			'page' => 'Partnership Types - Show', 
			'data' => $this->__partnershipTypeService->Find($id), 
			'back' => route('admin.join-programs.partnership-types.index'), 
		]);
	}
	
	public function destroy($id) {
        if (!$this->__partnershipTypeService->Delete($id))
            return Response::json(['type' => 'error', 'message' => 'Can\'t delete data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data deleted!'], 200);
	}
	
	public function move($id, $move = 0) {
        if (!$this->__partnershipTypeService->Move($id, $move))
            return Response::json(['type' => 'error', 'message' => 'Can\'t move data '.((int) $move === 0 ? 'up' : 'down').'!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data moved '.((int) $move === 0 ? 'up' : 'down').'!'], 200);
	}
	
	public function toggle($id, $toggle = 0) {
        if (!$this->__partnershipTypeService->Toggle($id, $toggle))
            return Response::json(['type' => 'error', 'message' => 'Can\'t '.((int) $toggle === 0 ? 'deactivate' : 'activate').' Data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data '.((int) $toggle === 0 ? 'deactivate' : 'activate').'d!'], 200);
	}
}
