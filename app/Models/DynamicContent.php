<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicContent extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;

    protected $fillable = ['author_id', 'contentable_id', 'contentable_type', 'order'];

    public $translatedAttributes = ['title', 'subtitle', 'excerpt', 'description', 'image_1', 'image_2', 'video_1', 'sliders', 'cta', 'cta_label', 'others', 'created_at'];

    public function Contentable()
    {
        return $this->morphTo('contentable');
    }
}
