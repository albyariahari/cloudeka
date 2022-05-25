<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
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

    public function Solution()
    {
        return $this->belongsTo('App\Models\Solution');
    }
}
