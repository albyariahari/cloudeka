<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewMasterModel extends Model 
{
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
	
    public function scopeIf($query, $column = 'is_active', $value = 1)
    {
        return $query->where($column, $value);
    }
}
