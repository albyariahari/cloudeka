<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;

class News extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['news_category_id', 'author_id', 'start_date', 'end_date', 'type'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'slug', 'short_description', 'description', 'summary', 'outer_thumbnail', 'inner_thumbnail', 'meta_title', 'meta_keyword', 'meta_description'];

    public function Category()
    {
        return $this->belongsTo('App\Models\NewsCategory', 'news_category_id', 'id');
    }

    public function Tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'news_tags', 'news_id', 'tag_id');
    }

    public function Author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }
}
