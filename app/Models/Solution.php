<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = [
		'title', 
		'slug', 
		'subtitle', 
		'images', 
		'logo_1', 
		'logo_2', 
		'description', 
		'excerpt', 
		'bottom_title', 
		'bottom_description', 
		'bottom_link', 
		'bottom_url', 
		'bottom_image', 
	];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function Products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_has_solutions', 'solution_id', 'product_id');
    }

    public function UseCases()
    {
        return $this->belongsToMany('App\Models\UseCase', 'solution_has_use_cases', 'solution_id', 'use_case_id');
    }
}
