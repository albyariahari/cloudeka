<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['title', 'subtitle', 'slug', 'images', 'logo_1', 'logo_2', 'excerpt', 'description', 'partner_description', 'meta_title', 'meta_keyword', 'meta_description'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
