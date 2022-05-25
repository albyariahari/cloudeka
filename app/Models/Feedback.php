<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'feedbacks';

    protected $fillable = [
        'documentation_id'
        , 'rate'
        , 'problem'
        , 'name'
        , 'company_name'
        , 'email'
        , 'phone'
        , 'description'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
        , 'updated_at' => 'datetime:Y-m-d'
	];

    public function Documentation() {
        return $this->belongsTo('App\Models\Documentation', 'documentation_id');
    }

}
