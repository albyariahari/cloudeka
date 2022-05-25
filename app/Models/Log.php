<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {
	public $timestamps = false;
	
    protected $fillable = [
        'action'
		, 'module'
		, 'record_id'
		, 'user_id'
		, 'action_at'
    ];
	
	public function User() {
		return $this->belongsTo('App\Models\User', 'user_id');
	}
	
	public function Documentation() {
		return $this->belongsTo('App\Models\Documentation', 'record_id');
	}
}