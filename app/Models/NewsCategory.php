<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;

class NewsCategory extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'slug'];

    public function ParentCategory()
    {
        return $this->belongsTo('App\Models\NewsCategory', 'parent_id', 'id');
    }

    public function SubCategory()
    {
        return $this->hasMany('App\Models\NewsCategory', 'parent_id', 'id');
    }

    public function CategoryTranslate()
    {
        return $this->hasMany('App\Models\NewsCategoryTranslation', 'news_category_id', 'id');
    }

    public function News()
    {
        return $this->hasMany('App\Models\News', 'news_category_id', 'id');
    }
}
