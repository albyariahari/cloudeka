<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;

class Faq extends Model implements ContractsTranslatable {
    use HasFactory, Translatable, SoftDeletes;
	
    protected $fillable = [
		'category_id'
		, 'order'
		, 'author_id'
		, 'update_id'
	];
	
    public $translatedAttributes = [
		'title'
		, 'name'
	];
	
    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
        , 'updated_at' => 'datetime:Y-m-d'
        , 'deleted_at' => 'datetime:Y-m-d'
    ];

    public function Category() {
        return $this->belongsTo('App\Models\FaqCategory', 'category_id');
    }

    public function Author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function Updater() {
        return $this->belongsTo('App\Models\User', 'update_id');
    }

    public function Items() {
        return $this->hasMany('App\Models\FaqItem', 'faq_id');
    }
}
