<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;

// Models
use App\Models\DynamicContent;
use App\Models\Feedback;


class FeedbackService {
    public function create($input) {
        return DB::transaction(function () use ($input) {
			$input['documentation_id'] = $input['documentation_id'];
			$input['rate'] = $input['rate'];
			$input['company_name'] = $input['company'];
			$input['name'] = $input['name'];
			$input['description'] = $input['notes'];
			$input['problem'] = $input['problems'];
			
			return Feedback::create($input);
        });
    }

	public function delete($id) {
        return DB::transaction(function () use ($id) {
			return Feedback::find($id)->delete();
        });
	}
}