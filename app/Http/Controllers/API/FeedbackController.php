<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

// Service(s)
use App\Services\FeedbackService;

// Request
use App\Http\Requests\API\Feedback\Store as FeedbackStoreRequest;

class FeedbackController extends Controller
{
    public function store(FeedbackStoreRequest $request, FeedbackService $service){

		if (!$service->create($request->all())) {
			return response()->json(['type' => 'error', 'message' => 'Can\'t send feedback!'], 500);
		} else {
			return response()->json(['type' => 'success', 'message' => 'Feedback sent!'], 200);
		}
    }
}
