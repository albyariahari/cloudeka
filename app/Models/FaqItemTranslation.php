<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqItemTranslation extends Model {
    use HasFactory;
	
	public $timestamps = false;

    protected $fillable = [
		'lang'
		, 'title'
		, 'slug'
		, 'description'
	];
}