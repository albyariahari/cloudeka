<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'name';

    protected $fillable = [
        'value'
    ];

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    public function scopeGetSettings($query, $name)
    {
        $query->select('*');
        if (!is_null($name)) {
            if (is_array($name)) {
                return $query->whereIn('name', $name);
            } else {
                return $query->where('name', $name);
            }
        }
    }
}
