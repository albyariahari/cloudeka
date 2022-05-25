<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model {
    use HasFactory;

    public function SliderItems() {
        return $this->hasMany('App\Models\SliderItem', 'slider_id');
    }

    public function Items() {
        return $this->hasMany('App\Models\SliderItem', 'slider_id');
    }
}