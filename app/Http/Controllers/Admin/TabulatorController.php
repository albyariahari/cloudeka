<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

// Service(s)
use App\Services\PartnerTableService;

class TabulatorController extends Controller {
    private $__partnerTableService = null;
	
	public function __construct(PartnerTableService $partnerTableService, Request $req) {
        $this->middleware(['permission:Show Partnership Type'])->only(['index']);
		
		$this->__partnerTableService = $partnerTableService;
	}
	
	public function index($code, Request $request) {
		$type_id = 0;

		if($code == 'reseller-tier' && $request->get('lang') == 'en')
			$type_id = 1;
		else if($code == 'wholesales-tier' && $request->get('lang') == 'en')
			$type_id = 2;
		else if($code == 'reseller-tier' && $request->get('lang') == 'id')
			$type_id = 3;
		else if($code == 'wholesales-tier' && $request->get('lang') == 'id')
			$type_id = 4;

		$columns = [
			[
				'formatter' => 'rowSelection', 
				'headerHozAlign' => 'center', 
				'headerSort' => false, 
				'hozAlign' => 'center', 
				'titleFormatter' => 'rowSelection', 
				'width' => 25, 
			]
		];
		$tableData = [];
		
		foreach ($this->__partnerTableService->Get(0, $type_id) as $val) {
			$columns[] = [			
				'editableTitle' => true, 
				'editor' => true, 
				'field' => $val->name, 
				'formatter' => 'textarea', 
				'headerHozAlign' => 'center', 
				'headerSort' => false, 
				'title' => $val->title, 
			];
		}
		
		foreach ($this->__partnerTableService->Get(1, $type_id) as $val) {
			$arr = [];
			$arr['id'] = $val->id;
			
			foreach ($val->columns as $col)
				$arr[$col->name] = $col->pivot->description;
			
			$tableData[] = $arr;
		}
		
        return view('admin.tabulator.index', [
			'page' => 'TABULATOR - Index', 
			'tableData' => $tableData, 
			'columns' => $columns,
			'code' => $type_id,
			'languages' => languages(),
			'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en'))
		]);
	}
	
	public function updateColumn($code, Request $req) {
        $data = $this->__partnerTableService->UpdateColumn($code, $req->all());
		
		return Response::json($data, $data['code']);
	}
	
	public function updateRow($code, Request $req) {
        $data = $this->__partnerTableService->UpdateRow($code, $req->all());
		
		return Response::json($data, $data['code']);
	}
	
	public function destroyRow($code, Request $req) {
        if ($this->__partnerTableService->DeleteRow($req->id))
			return Response::json([ 'type' => 'success', 'message' => 'Row deleted.' ], 200);
		else
			return Response::json([ 'type' => 'error', 'message' => 'Can\'t delete row.' ], 500);
	}
	
	public function destroyColumn($code, Request $req) {
        if ($this->__partnerTableService->DeleteColumn($req->name))
			return Response::json([ 'type' => 'success', 'message' => 'Column deleted.' ], 200);
		else
			return Response::json([ 'type' => 'error', 'message' => 'Can\'t delete column.' ], 500);
	}
	
	public function move($id, $move = 0) {
        //
	}
	
	public function toggle($id, $toggle = 0) {
        //
	}
}