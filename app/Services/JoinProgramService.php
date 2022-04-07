<?php

namespace App\Services;

use Auth;
use DB;

// Models
use App\Models\JoinProgram;
use App\Models\Page;

class JoinProgramService {
	private $__model;
	
	public function __construct() {
		$this->__model = new JoinProgram;
	}
	
	public function Check($id = null) {
		$arr = [];
		
		if (!is_null($id) && (!$data = $this->Find($id))) {
			$arr['result'] = false;
			$arr['url'] = route('admin.join-programs.messages.index');
			$arr['error'] = 'Data not found.';
		} else {
			$arr['result'] = true;
			$arr['data'] = $id ? $data : $id;
		}
		
		return $arr;
	}
	
    public function Create(array $input) {
		return DB::transaction(function () use ($input) {
			$input['sent_at'] = date('Y-m-d H:i:s.u');
			
			$data = $this->__model->create($input);
			$data->partnershipTypes()->attach($input['partnership_types']);
			$data->solutionInterests()->attach($input['solution_interests']);
			
			return $data;
		});
    }
	
    public function Delete($value, $attribute = 'id') {
		return DB::transaction(function () use ($value, $attribute) {
			return $this->__model->where($attribute, $value)->delete();
		});
	}
	
	public function Find($id, array $columns = ['*']) {
		return $this->__model->find($id, $columns);
	}
	
	public function FindBy($value, $attribute = 'id', array $columns = ['*']) {
		return $this->__model->where($attribute, $value)->find($id, $columns);
	}
	
	public function Get(array $columns = ['*']) {
		return $this->__model->get($columns);
	}
	
	public function Pluck($value, $key = null, $orderBy = null) {
		return $this->__model->orderBy($orderBy ?? $value)->pluck($value, $key ?? $value)->toArray();
	}
	
    public function Update($id, array $input) {
		return DB::transaction(function () use ($id, $input) {
			$input['name'] = trim($input['name']);
			$input['code'] = trim(strtolower(str_replace('&', ' & ', $input['code'])));
			$input['is_active'] = $input['is_active'] ?? 0;
			$input['update_id'] = Auth::id();
			
			return $this->Find($id)->update($input);
		});
    }
	
	public function GetNotification($type = 1, $lang = 'en') {
		return Page::where('anchor', 'join-program')
					->first()
					->sections()->where('name', ($type === 1 ? 'Success' : 'Failed').' Notification')
					->first()
					->translate($lang);
	}
}