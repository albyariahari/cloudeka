<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
class Documentation extends MasterModel implements ContractsTranslatable {
    use HasFactory, Translatable, SoftDeletes;
	
    protected $fillable = [
		'product_id'
		, 'parent_id'
		, 'view_count'
		, 'level'
		, 'order'
		, 'created_at'
		, 'updated_at'
		, 'status'
		, 'publish_at'
	];
	
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s'
        , 'updated_at' => 'datetime:Y-m-d H:i:s'
        , 'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];
	
    public $translatedAttributes = [
		'name'
		, 'title'
		, 'description'
		, 'file'
		, 'meta_title'
		, 'meta_keywords'
		, 'meta_description'
	];
	
	public $log_module = 'Documentation';
	
    public $blacklist = [
		'created_at'
		, 'updated_at'
		, 'deleted_at'
	];
	
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

		static::addGlobalScope('order', function (Builder $builder) {
			$builder->orderBy('order', 'asc');
		});
	}
	
    public function Product() {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function Parent() {
        return $this->belongsTo('App\Models\Documentation', 'parent_id');
    }

    public function Childs() {
        return $this->hasMany('App\Models\Documentation', 'parent_id');
    }
	
	public function ParentRec() {
        return $this->Parent()->with('ParentRec');
	}
	
	public function ChildsRec() {
        return $this->Childs()->with('ChildsRec');
	}

    public function Logs() {
        return $this->hasMany('App\Models\Log', 'record_id');
    }
}