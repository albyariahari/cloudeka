<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqCategory extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
		'title'
		, 'slug'
		, 'order'
		, 'author_id'
		, 'update_id'
	];
	
    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
        , 'updated_at' => 'datetime:Y-m-d'
        , 'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function Faqs() {
        return $this->hasMany('App\Models\Faq', 'category_id');
    }

    public function Author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function Updater() {
        return $this->belongsTo('App\Models\User', 'update_id');
    }
}
