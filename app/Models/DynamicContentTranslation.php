<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicContentTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'excerpt', 'description', 'image_1', 'image_2', 'video_1', 'sliders', 'cta', 'cta_label', 'others', 'created_at'];

    public function DynamicContent()
    {
        return $this->belongsTo('App\Models\DynamicContent');
    }
}
