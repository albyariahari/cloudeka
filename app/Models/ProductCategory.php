<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function Documentations() {
        return $this->hasManyThrough('App\Models\Documentation', 'App\Models\Product', 'category_id', 'product_id');
    }

    public function Products() {
        return $this->hasMany('App\Models\Product', 'category_id');
    }
}