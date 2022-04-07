<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Message;

// Datatables
use App\DataTables\MessageDataTable;

// Services
use App\Services\MessageService;

class MessageController extends Controller {
    public function index(MessageDataTable $dataTable) {
        return $dataTable->render('admin.message.index', [
			'page' => 'Message - List'
		]);
    }
	
    public function show($id) {
		if (!$data = Message::with(['need', 'hear'])->find($id))
			return redirect(route('admin.message.index'))->withError('Message not found!');
		
        return view('admin.message.show', [
			'page' => 'Show Detail Message'
			, 'data' => $data
		]);
    }
	
    public function destroy(MessageService $service, $id) {
		if (!$data = Message::find($id))
			return response()->json(['type' => 'error', 'message' => 'Message not found!'], 404);
        else if (!$service->delete($data->id))
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete Message!'], 500);
        else
			return response()->json(['type' => 'success', 'message' => 'Message deleted!'], 200);
    }
}