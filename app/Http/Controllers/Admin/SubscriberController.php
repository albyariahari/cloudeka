<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

// Models
use App\Models\Subscriber;

// Datatables
use App\DataTables\SubscriberDataTable;

// Services
use App\Services\SubscriberService;

// Exports
use App\Exports\SubscriberExport;

class SubscriberController extends Controller {
    public function index(SubscriberDataTable $dataTable) {
        return $dataTable->render('admin.subscriber.index', [
			'page' => 'Subscriber - List'
		]);
    }
	
    public function destroy(SubscriberService $service, $id) {
        if (!$data = Subscriber::find($id))
			return response()->json(['type' => 'error', 'message' => 'Subscriber not found!'], 404);
        else if (!$service->delete($data->id))
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete Subscriber!'], 500);
        else
			return response()->json(['type' => 'success', 'message' => 'Subscriber deleted!'], 200);
    }
	
	public function export() {
		return Excel::download(new SubscriberExport, 'subscriber_'.date('YmdHis').'.xlsx');
	}
}