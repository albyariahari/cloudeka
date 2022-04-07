<?php

namespace App\Services;

use Auth;
use DB;

// Model(s)
use App\Models\Partners\PartnerColumn;
use App\Models\Partners\PartnerRow;

class PartnerTableService {
	private $__modelColumn;
	private $__modelRow;
	
	public function __construct() {
		$this->__modelColumn = new PartnerColumn;
		$this->__modelRow = new PartnerRow;
	}
	
	public function DeleteRow($id) {
		return DB::transaction(function () use ($id) {
			return $this->Find($id, 1)->delete();
		});
	}
	
	public function DeleteColumn($name) {
		return DB::transaction(function () use ($name) {
			return $this->FindBy($name, 'name')->first()->delete();
		});
	}
	
	public function UpdateColumn($code, array $input) {
		return DB::transaction(function () use ($code, $input) {
			$input['title'] = trim($input['title']);
			
			if ($data = $this->FindBy($input['name'], 'name')->first()) {
				$input['update_id'] = Auth::id();
				
				$data->update($input);
				
				return ['code' => 200, 'message' => 'Column updated.', 'type' => 'success'];
			} else {
				$input['type_id'] = $code;
				$input['order'] = ($this->Get()->last()->order ?? 0) + 1;
				$input['author_id'] = Auth::id();
				
				return [
					'code' => 201, 
					'data' => $this->__GetModel()->create($input), 
					'message' => 'Column created.', 
					'type' => 'success'
				];
			}
		});
    }
	
	public function UpdateRow($code, array $input) {
		return DB::transaction(function () use ($code, $input) {
			$colName = trim($input['col_name']);
			$columns = $input['columns'] ?? null;
			
			if (!$this->FindBy($colName, 'name')->first())
				return !empty($columns[$colName]) ? ['code' => 500, 'message' => 'This column have no name.', 'type' => 'error'] : ['code' => 200];
			
			$pivotData = [];
			
			foreach ($columns as $key => $val) {
				if ($key !== 'id' && ($column = $this->FindBy($key, 'name')->first()))
					$pivotData[$column->id] = ['description' => $val];
			}
			
			if (isset($input['id'])) {
				if (!$data = $this->Find($input['id'], 1))
					return ['code' => 404, 'message' => 'Row not found.', 'type' => 'error'];
				
				$data->columns()->sync($pivotData);
				$data->update(['update_id' => Auth::id()]);
				
				return ['code' => 200, 'message' => 'Row updated.', 'type' => 'success'];
			} else {
				$micro = explode(' ', microtime());
				$input['type_id'] = $code;
				$input['name'] = date('YmdHis', $micro[1]).substr(round($micro[0] * 1000), 0, 3);
				$input['order'] = ($this->__getModel(1)->where('type_id', $input['type_id'])->get()->last()->order ?? 0) + 1;
				$input['author_id'] = Auth::id();
				
				$data = $this->__GetModel(1)->create($input);
				$data->columns()->attach($pivotData);
				
				return [
					'code' => 201, 
					'data' => $data, 
					'message' => 'Row created.', 
					'type' => 'success'
				];
			}
		});
    }
	
	public function Find($id, $type = 0, array $columns = ['*']) {
		return $this->__GetModel($type)->find($id, $columns);
	}
	
	public function FindBy($value, $attribute = 'id', $type = 0, array $columns = ['*']) {
		return $this->__GetModel($type)->where($attribute, $value)->get($columns);
	}
	
	public function Get($type = 0, $type_id = 1, array $columns = ['*'], $activeOnly = 1) {
		if ($activeOnly === 1)
			return $this->__GetModel($type)->where('type_id', $type_id)->active()->get($columns);
		
		return $this->__GetModel($type)->where('type_id', $type_id)->get($columns);
	}
	
	public function Get2($typeId, $type = 0, array $columns = ['*'], $activeOnly = 1) {
		if ($activeOnly === 1)
			return $this->__GetModel($type)->active()->where('type_id', $typeId)->get($columns);
		
		return $this->__GetModel($type)->where('type_id', $type_id)->get($columns);
	}
	
	private function __GetModel($type = 0) {
		return $type === 0 ? $this->__modelColumn : $this->__modelRow;
	}
	
	/*public function Move($id, $step = 0, array $conditions = []) {
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
    }*/
}