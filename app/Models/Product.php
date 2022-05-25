<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'slug', 'description', 'exceprt', 'images', 'logo_1', 'logo_2', 'partner_description', 'meta_title', 'meta_keyword', 'meta_description'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function Category()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }

    public function Partners()
    {
        return $this->belongsToMany('App\Models\Partner', 'partner_has_products', 'product_id', 'partner_id');
    }

    public function UseCases()
    {
        return $this->belongsToMany('App\Models\UseCase', 'product_has_use_cases', 'product_id', 'use_case_id');
    }

    public function Benefits()
    {
        return $this->hasMany('App\Models\Benefit');
    }

    public function Packages()
    {
        return $this->hasMany('App\Models\Package');
    }

    public function Calculators()
    {
        return $this->hasMany('App\Models\Calculator');
    }

    public function Solutions()
    {
        return $this->belongsToMany('App\Models\Solution', 'product_has_solutions', 'product_id', 'solution_id');
    }

    public function Documentations() {
        return $this->hasMany('App\Models\Documentation', 'product_id');
    }

    public function Promotions() {
        return $this->hasMany('App\Models\Promotion', 'product_id');
    }
}