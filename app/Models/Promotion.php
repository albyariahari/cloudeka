<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;

class Promotion extends Model implements ContractsTranslatable {
    use HasFactory, Translatable, SoftDeletes;

    protected $fillable = [
		'product_id'
		, 'start_date'
		, 'end_date'
		, 'is_popup'
		, 'author_id'
		, 'update_id'
	];

    public $translatedAttributes = [
		'title'
		, 'excerpt'
		, 'description'
		, 'url'
		, 'image'
	];
	
    protected $casts = [
        'start_date' => 'datetime:d/m/Y'
        , 'end_date' => 'datetime:d/m/Y'
        , 'created_at' => 'datetime:Y-m-d H:i:s'
        , 'updated_at' => 'datetime:Y-m-d H:i:s'
        , 'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function Product() {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function Author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function Updater() {
        return $this->belongsTo('App\Models\User', 'update_id');
    }
}