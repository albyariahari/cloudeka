<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Models
use App\Models\Subscriber;

// Services
use App\Services\SubscriberService;

// Requests
use App\Http\Requests\Web\Subscriber\Store as StoreSubscriberRequest;

class SubscriberController extends Controller {
    public function __construct() {
        parent::__construct();
    }
	
    public function subscribe(StoreSubscriberRequest $request, SubscriberService $service) {
		if (Subscriber::where('email', $request->email)->first())
			return response()->json(['type' => 'error', 'message' => 'You have already subscribed!'], 500);
		else if (!$service->create($request->all()))
			return response()->json(['type' => 'error', 'message' => 'Can\'t subscribe!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'You have subscribed!'], 200);
    }
}
