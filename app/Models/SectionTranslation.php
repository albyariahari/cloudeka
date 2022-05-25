<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
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
