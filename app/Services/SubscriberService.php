<?php

namespace App\Services;

use Illuminate\Http\Request;
use Auth;
use DB;

// Models
use App\Models\Subscriber;

class SubscriberService {
    public function create($input) {
        return DB::transaction(function () use ($input) {
			$input['created_at'] = date('Y-m-d H:i:s');
			
			return Subscriber::create($input);
        });
    }
	
	public function delete($id) {
        return DB::transaction(function () use ($id) {
			return (!$data = Subscriber::find($id)) ? false : $data->delete();
        });
	}
}