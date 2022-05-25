<?php

namespace App\Services;

use Auth;
use DB;

// Models
use App\Models\PartnershipType;

class PartnershipTypeService {
	private $__model;
	
	public function __construct() {
		$this->__model = new PartnershipType;
	}
	
	public function Check($id = null) {
		$arr = [];
		
		if (!is_null($id) && (!$data = $this->Find($id))) {
			$arr['result'] = false;
			$arr['url'] = route('admin.join-programs.partnership-types.index');
			$arr['error'] = 'Data not found.';
		} else {
			$arr['result'] = true;
			$arr['data'] = $id ? $data : $id;
		}
		
		return $arr;
	}
	
    public function Create(array $input) {
		return DB::transaction(function () use ($input) {
			$input['name'] = trim($input['name']);
			$input['code'] = trim(strtolower($input['code']));
			$input['is_active'] = $input['is_active'] ?? 0;
			$input['order'] = ($this->__model/*->active()*/->get()->last()->order ?? 0) + 1;
			$input['author_id'] = Auth::id();
			
			return $this->__model->create($input);
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
	
	public function Get(array $columns = ['*'], $activeOnly = 1) {
		if ($activeOnly === 1)
			return $this->__model->active()->get($columns);
		
		return $this->__model->get($columns);
	}
	
	public function Move($id, $step = 0, array $conditions = []) {
		return DB::transaction(function () use ($id, $step, $conditions) {
			$isMoveUp = $step < 1;
			$conditions = is_array($conditions) ? $conditions : [];
			$collections = $this->__model->where($conditions)->orderBy('order')->get();
			
			if ($collections->count() < 2)
				return false;
			
			$moveToNew = $this->Find($id);
			$oldOrder = $moveToNew->order;
			
			if (($isMoveUp && $oldOrder === $collections->first()->order) || (!$isMoveUp && $oldOrder === $collections->last()->order))
				return false;
			
			$newOrder = $oldOrder + ($isMoveUp ? -1 : 1);
			$moveToOld = $this->__model->where('id', '<>', $id)->where('order', $newOrder)->where($conditions)->first();
			
			if ($moveToOld)
				return $moveToNew->update(['order' => $newOrder]) && $moveToOld->update(['order' => $oldOrder]);
			
			return $moveToNew->update(['order' => $newOrder]);
		});
    }
	
    public function Toggle($id, $status = 1) {
		return DB::transaction(function () use ($id, $status) {
			return $this->Find($id)->update([
				'is_active' => (int) $status === 1, 
				'update_id' => Auth::id(), 
			]);
		});
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
}