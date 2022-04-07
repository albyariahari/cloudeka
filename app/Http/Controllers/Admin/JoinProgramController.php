<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

// Datatable
use App\DataTables\JoinProgramDataTable;

// Request(s)
//

// Service(s)
use App\Services\JoinProgramService;

class JoinProgramController extends Controller
{
    private $__joinProgramService = null;
	
	public function __construct(JoinProgramService $joinProgramService, Request $req) {
        $this->middleware(['permission:Show Join Program'])->only(['show']);
        $this->middleware(['permission:Delete Join Program'])->only(['destroy']);
		
		$this->__joinProgramService = $joinProgramService;
	}
	
	public function index(JoinProgramDataTable $dataTable, Request $req) {
        return $dataTable->with([
			'date_from' => $req->date_from, 
			'date_to' => $req->date_to, 
			'email' => $req->email, 
		])->render('admin.join-programs.index', [
			'page' => 'Join Programs Message - Index', 
			'emails' => $this->__joinProgramService->pluck('email'), 
		]);
	}
	
	public function create() {
        //
	}
	
	public function store() {
        //
	}
	
	public function edit() {
        //
	}
	
	public function Update() {
		//
	}
	
	public function show($id) {
		$data = $this->__joinProgramService->Find($id);
		
        return view('admin.join-programs.show', [
			'page' => 'Join Programs Message - Show', 
			'data' => $data, 
			'back' => route('admin.join-programs.messages.index'), 
		]);
	}
	
	public function destroy($id) {
        if (!$this->__joinProgramService->Delete($id))
            return Response::json(['type' => 'error', 'message' => 'Can\'t delete data!'], 500);
        else
			return Response::json(['type' => 'success', 'message' => 'Data deleted!'], 200);
	}
}
