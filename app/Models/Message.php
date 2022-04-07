<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model {
    use HasFactory;
	
    protected $fillable = ['need_id', 'hear_id', 'name', 'company_name', 'email', 'phone', 'description'];
	
	protected $casts = [
        'created_at' => 'datetime:Y-m-d'
        , 'updated_at' => 'datetime:Y-m-d'
	];
	
	public function Need() {
		return $this->belongsTo('App\Models\DynamicContent', 'need_id');
	}
	
	public function Hear() {
		return $this->belongsTo('App\Models\DynamicContent', 'hear_id');
	}
}
