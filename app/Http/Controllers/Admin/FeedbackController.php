<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Datatables
use App\DataTables\FeedbackDataTable;

use App\Models\Feedback;
use App\Services\FeedbackService;

class FeedbackController extends Controller
{
    public function index(FeedbackDataTable $dataTable) {
        return $dataTable->render('admin.feedback.index', [
			'page' => 'Feedback - List'
		]);
    }

    public function show(Request $request, $id) {
		if (!$data = Feedback::find($id))
			return redirect(route('admin.feedback.index'))->withError('Feedback not found!');
		
        return view('admin.feedback.show', [
			'page' => 'Show Detail Feedback'
			, 'data' => $data
			, 'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en'))
			, 'languages' => languages()
		]);
    }
    
    public function destroy(FeedbackService $service, $id) {
		if (!$data = Feedback::find($id))
			return response()->json(['type' => 'error', 'message' => 'Feedback not found!'], 404);
        else if (!$service->delete($data->id))
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete Feedback!'], 500);
        else
			return response()->json(['type' => 'success', 'message' => 'Feedback deleted!'], 200);
    }
}
