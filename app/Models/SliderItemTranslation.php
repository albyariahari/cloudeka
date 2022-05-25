<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderItemTranslation extends Model {
    use HasFactory;

    protected $fillable = [
		'lang'
		, 'title'
		, 'subtitle'
		, 'description'
		, 'cta'
		, 'cta_label'
	];
	
	public $timestamps = false;
}