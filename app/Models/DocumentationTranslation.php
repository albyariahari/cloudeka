<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentationTranslation extends MasterModel {
    use HasFactory;
	
    protected $fillable = [
		'name'
		, 'title'
		, 'description'
		, 'file'
		, 'meta_title'
		, 'meta_keywords'
		, 'meta_description'
	];
	
	public $timestamps = false;
	
	public $log_module = '';
	
	public $blacklist = [];
	
	protected static function boot() {
		parent::boot();
		
		static::created(function ($model) {
			$model->_addLog($model, $model->log_module, $model->blacklist);
		});
		
		static::updated(function ($model) {
			$model->_addLog($model, $model->log_module, $model->blacklist, 'edit');
		});
		
		static::deleted(function ($model) {
			$model->_addLog($model, $model->log_module, $model->blacklist, 'delete');
		});
	}

    public function Header() {
        return $this->belongsTo('App\Models\Documentation', 'documentation_id');
    }
}
