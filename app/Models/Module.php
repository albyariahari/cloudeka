<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function DynamicContents()
    {
        return $this->morphMany('App\Models\DynamicContent', 'contentable');
    }

    public function ContentSettings()
    {
        return $this->morphMany('App\Models\ContentSetting', 'contentable');
    }
}
