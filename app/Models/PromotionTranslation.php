<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionTranslation extends Model {
    use HasFactory;
	
    protected $fillable = [
		'lang'
		, 'title'
		, 'excerpt'
		, 'description'
		, 'url'
		, 'image'
	];
	
	public $timestamps = false;
	
    public function Promotion() {
        return $this->belongsTo('App\Models\Promotion', 'promotion_id');
    }
}