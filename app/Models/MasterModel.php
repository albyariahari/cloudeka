<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Log;
use App\Models\LogDetail;

use Auth;

class MasterModel extends Model {
	protected static function _addLog($model, $module = '', $blacklist = [], $action = 'create') {
		if ($module !== '') {
			$log = Log::create([
				'action' => $action
				, 'module' => $module
				, 'record_id' => $model->id
				, 'user_id' => Auth::id()
				, 'action_at' => date('Y-m-d H:i:s')
			]);
		} else {
			$log = Log::orderBy('id', 'DESC')->first();
		}
		
		$fillables[$model->getTable()] = array_diff($model->getFillable(), $blacklist);
		
		foreach ($fillables as $table => $columns) {
			foreach ($columns as $column) {
				if (isset($model->{$column})) {
					$flag = true;
					$detail = [];
					$detail['log_id'] = $log->id;
					$detail['action'] = $action;
					$detail['table'] = $model->getTable();
					$detail['column'] = $column;
					$detail['record_id'] = $model->id;
					
					if ($action === 'create') {
						$detail['new_value'] = $model->{$column};
					} elseif ($action === 'edit') {
						$detail['old_value'] = $model->getOriginal($column);
						$detail['new_value'] = $model->{$column};
						$flag = $detail['old_value'] != $detail['new_value'];
					} elseif ($action === 'delete') {
						$detail['old_value'] = $model->{$column};
					}
					
					if ($flag)
						LogDetail::create($detail);
				}
			}
		}
	}
}