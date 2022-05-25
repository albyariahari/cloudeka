<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['title', 'slug', 'short_description', 'description', 'summary', 'outer_thumbnail', 'inner_thumbnail', 'meta_title', 'meta_keyword', 'meta_description'];

    public function News()
    {
        return $this->belongsTo('App\Models\News');
    }
}
