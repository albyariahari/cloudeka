<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;

// Models
use App\Models\DynamicContent;
use App\Models\Message;

class MessageService {
    public function Create($input) {
        return DB::transaction(function () use ($input) {
			$input['need_id'] = $input['need'];
			$input['hear_id'] = DynamicContent::find($input['hear']) ? $input['hear'] : null;
			$input['company_name'] = $input['company'];
			$input['name'] = $input['full-name'];
			$input['description'] = $input['message'];
			
			return Message::create($input);
        });
    }
	
	public function delete($id) {
        return DB::transaction(function () use ($id) {
			return Message::find($id)->delete();
        });
	}
}