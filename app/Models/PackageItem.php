<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'package_id', 'package_type_id', 'monthly_price', 'hourly_price', 'excerpt_en', 'excerpt_id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function CalculatorComponents()
    {
        return $this->belongsToMany('App\Models\CalculatorComponent', 'package_item_has_cal_components', 'package_item_id', 'calculator_component_id')->withPivot('value');
    }

    public function Package()
    {
        return $this->belongsTo('App\Models\Package');
    }

    public function scopeFeatured($query, $type)
    {
        return $query->where('is_featured', $type);
    }
}
