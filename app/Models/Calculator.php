<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'package_id'];

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
        return $this->belongsToMany('App\Models\CalculatorComponent', 'calculator_has_cal_components', 'calculator_id', 'calculator_component_id')->withPivot('price', 'other_rules', 'pricing_impact_rules', 'rule_editable', 'rule_min_value', 'rule_max_value', 'rule_must_be_even', 'visible', 'display_mode');
    }

    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function Package()
    {
        return $this->belongsTo('App\Models\Package');
    }
}
