<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Astrotomic\Translatable
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;

class SliderItem extends Model implements ContractsTranslatable {
    use HasFactory, Translatable, SoftDeletes;
	
    protected $fillable = [
		'slider_id'
		, 'image'
		, 'video'
		, 'order'
		, 'author_id'
		, 'update_id'
	];

    public $translatedAttributes = [
		'title'
		, 'subtitle'
		, 'description'
		, 'cta'
		, 'cta_label'
	];
	
    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
        , 'updated_at' => 'datetime:Y-m-d'
        , 'deleted_at' => 'datetime:Y-m-d'
    ];

    public function Slider() {
        return $this->hasMany('App\Models\Slider', 'slider_id');
    }

    public function Author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function Updater() {
        return $this->belongsTo('App\Models\User', 'update_id');
    }
}