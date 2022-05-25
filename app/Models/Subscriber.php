<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model {
    use HasFactory;
	
	public $timestamps = false;
	
    protected $fillable = ['email', 'created_at'];
	
    protected $casts = ['created_at' => 'datetime:Y-m-d H:i:s'];
}
