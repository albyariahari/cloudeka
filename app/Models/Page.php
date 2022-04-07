<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'anchor', 'meta_keyword', 'meta_description', 'meta_title'];

    public function Sections()
    {
        return $this->hasMany('App\Models\Section')->orderBy('order', 'asc');
    }
}
