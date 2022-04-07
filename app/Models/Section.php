<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
		'title', 
		'subtitle', 
		'description',  
		'link_title_1', 
		'link_url_1',  
		'link_title_2', 
		'link_url_2', 
		'image_1', 
		'image_2', 
		'video_1', 
		'sliders', 
		'cta', 
		'cta_label', 
		'others', 
	];
}
