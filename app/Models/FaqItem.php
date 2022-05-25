<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;

class FaqItem extends Model implements ContractsTranslatable {
    use HasFactory, Translatable, SoftDeletes;
	
    protected $fillable = [
		'faq_id'
		, 'order'
		, 'author_id'
		, 'update_id'
	];
	
    public $translatedAttributes = [
		'title'
		, 'slug'
		, 'description'
	];
	
    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
        , 'updated_at' => 'datetime:Y-m-d'
        , 'deleted_at' => 'datetime:Y-m-d'
    ];

    public function Faq() {
        return $this->belongsTo('App\Models\Faq', 'faq_id');
    }

    public function Author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function Updater() {
        return $this->belongsTo('App\Models\User', 'update_id');
    }
}