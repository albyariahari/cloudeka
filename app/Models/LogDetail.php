<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogDetail extends Model {
	public $timestamps = false;
	
    protected $fillable = [
        'log_id'
		, 'action'
		, 'table'
		, 'column'
		, 'record_id'
		, 'old_value'
		, 'new_value'
    ];
}