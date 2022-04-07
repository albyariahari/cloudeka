<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorComponent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'title', 'slug', 'unit', 'price_per_unit', 'data_type', 'data_group', 'hint', 'price'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function subComponents()
    {
        return $this->hasMany('App\Models\CalculatorComponent', 'parent_id', 'id');
    }

    public function parentComponent()
    {
        return $this->hasOne('App\Models\CalculatorComponent', 'id', 'parent_id');
    }

    public function Calculators()
    {
        return $this->belongsToMany('App\Models\Calculators', 'calculator_has_cal_components', 'calculator_component_id', 'calculator_id')->withPivot('price', 'rule_min_value', 'rule_max_value', 'rule_must_be_even');
    }

    public function PackageItems()
    {
        return $this->belongsToMany('App\Models\PackageItem', 'package_item_has_cal_components', 'calculator_component_id', 'package_item_id')->withPivot('value');
    }
}
