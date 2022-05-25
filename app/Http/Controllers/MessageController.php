<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendContactUsNotification;

// Model(s)
use App\Models\DynamicContent;
use App\Models\Setting;

// Service(s)
use App\Services\MessageService;

// Request(s)
use App\Http\Requests\Web\Message\Store as StoreMessageRequest;

class MessageController extends Controller {
    public function __construct() {
        parent::__construct();
    }
	
    public function send(StoreMessageRequest $request, MessageService $service) {
		if (!$service->Create($request->all())) {
			return response()->json(['type' => 'error', 'message' => 'Can\'t send question!'], 500);
		} else {
			$subject = Setting::where('name', 'setting__notif_subject')->first()->value;
			$from = Setting::where('name', 'setting__notif_from')->first()->value;
			$to = Setting::where('name', 'setting__notif_to')->first()->value;
			$cc = Setting::where('name', 'setting__notif_cc')->first()->value;
			$bcc = Setting::where('name', 'setting__notif_bcc')->first()->value;
			
			if ($subject && $from && $to) {
				$mail['subject'] = $subject;
				$mail['from'] = $from;
				$mail['to'] = $to;
				$mail['cc'] = $cc;
				$mail['bcc'] = $bcc;
				
				$input = $request->all();
				
				$input['need'] = DynamicContent::find($input['need'])->translate('en')->title;
				
				if ($hear = DynamicContent::find($input['hear']))
					$input['hear'] = $hear->translate('en')->title;
				else
					$input['hear'] = $input['other'];
				
				$mail['data'] = $input;
				
				try {
					\Mail::send(new SendContactUsNotification($mail));
				} catch (Exception $ex) {
					return response()->json(['message' => $ex->getMessage(), 'type' => 'error'], 500);
				}
			}
			
			return response()->json(['type' => 'success', 'message' => 'Question sent!'], 200);
		}
    }
}
