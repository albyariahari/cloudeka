<?php

namespace App\Services\Benefit;

use Illuminate\Support\Str;
use Auth;
use DB;

// Model(s)
use App\Models\Benefit\BenefitCategory;
use App\Models\Benefit\BenefitUpgrade;

class BenefitUpgradeService {
	private $__modelCategory;
	private $__model;
	
	public function __construct(BenefitCategory $modelCategory, BenefitUpgrade $model) {
		$this->__modelCategory = $modelCategory;
		$this->__model = $model;
	}
	
	public function Check($categoryId, $id) {
		if (!$data = $this->Find($id))
			return [ 'result' => false, 'url' => route('admin.benefits.upgrades.index', [ $categoryId ]), 'error' => 'Data not found.' ];
		
		return [ 'result' => true, 'data' => $data ];
	}
	
    public function Create($categoryId, array $input) {
		return DB::transaction(function () use ($categoryId, $input) {
			$category = $this->__modelCategory->find($categoryId);
			
			$input['name'] = trim($input['name']);
			$input['code'] = isset($input['code']) ? Str::slug($input['code']) : Str::slug($input['name']);
			$input['is_active'] = $input['is_active'] ?? 0;
			$input['order'] = ($this->Get($category->id)->last()->order ?? 0) + 1;
			
			$data = $category->upgrades()->create($input + $this->__GetUserId(0));
			$data->levels()->attach($input['levels']);
			
			return $data;
		});
    }
	
    public function Delete($id) {
		return DB::transaction(function () use ($id) {
			return $this->Find($id)->delete();
		});
	}
	
	public function Find($id, array $columns = [ '*' ], $activeOnly = 0) {
		if ($activeOnly === 1)
			return $this->__model->active()->find($id, $columns);
		
		return $this->__model->find($id, $columns);
	}
	
	public function FindBy($value, $attribute, array $columns = [ '*' ], $activeOnly = 1) {
		if ($activeOnly === 1)
			return $this->__model->active()->where($attribute, $value)->get($columns);
		
		return $this->__model->where($attribute, $value)->get($columns);
	}
	
	public function FindByCode($code, array $columns = [ '*' ], $activeOnly = 1) {
		return $this->FindBy($code, 'code', $columns, $activeOnly)->first();
	}
	
	public function FindByConditions(array $conditions, array $columns = [ '*' ], $activeOnly = 1) {
		if (count($conditions)) {
			if ($activeOnly === 1)
				return $this->__model->active()->where($conditions)->get($columns);
			
			return $this->__model->where($conditions)->get($columns);
		} else {
			if ($activeOnly === 1)
				return $this->__model->active()->get($columns);
			
			return $this->Get($columns);
		}
	}
	
	public function Get($categoryId, array $columns = [ '*' ], $activeOnly = 1) {
		if ($activeOnly === 1)
			return $this->__model->active()->parent($categoryId)->get($columns);
		
		return $this->__model->parent($categoryId)->get($columns);
	}
	
	public function Move($categoryId, $id, $step = 0, array $conditions = []) {
		return DB::transaction(function () use ($categoryId, $id, $step, $conditions) {
			array_push($conditions, [ 'category_id', $categoryId ]);
			$isMoveUp = $step < 1;
			$collections = $this->FindByConditions($conditions);
			
			if ($collections->count() < 2)
				return false;
			
			$data = $this->Find($id);
			
			if (($isMoveUp && $data->order === $collections->first()->order) || (!$isMoveUp && $data->order === $collections->last()->order))
				return false;
			
			$newOrder = $data->order + ($isMoveUp ? -1 : 1);
			array_push($conditions, [ 'category_id', $categoryId ], [ 'id', '<>', $id ], [ 'order', $newOrder ]);
			
			if ($dataMove = $this->FindByConditions($conditions)->first())
				$dataMove->update([ 'order' => $data->order ] + $this->__GetUserId());
			
			return $data->update([ 'order' => $newOrder ] + $this->__GetUserId());
		});
    }
	
    public function Toggle($id, $status = 1) {
		return DB::transaction(function () use ($id, $status) {
			return $this->Find($id)->update([ 'is_active' => $status ] + $this->__GetUserId());
		});
    }
	
    public function Update($id, array $input) {
		return DB::transaction(function () use ($id, $input) {
			$input['name'] = trim($input['name']);
			$input['code'] = isset($input['code']) ? Str::slug($input['code']) : Str::slug($input['name']);
			$input['is_active'] = $input['is_active'] ?? 0;
			
			$data = $this->Find($id);
			$data->update($input + $this->__GetUserId());
			$data->levels()->sync($input['levels']);
			
			return $data;
		});
    }
	
	private function __GetUserId($isUpdate = 1) {
		return [ $isUpdate === 1 ? 'update_id' : 'author_id' => Auth::id() ];
	}
}