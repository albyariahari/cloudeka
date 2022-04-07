<?php

namespace App\Models\Benefit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\OrderScope;

class BenefitType extends Model {
    use HasFactory, SoftDeletes;
	
	protected $fillable = [
        'name', 
		'code', 
		'is_active', 
		'order', 
		'author_id', 
		'update_id', 
	];
	
	protected $casts = [
		'is_active' => 'boolean', 
		'created_at' => 'datetime', 
		'updated_at' => 'datetime', 
	];
    
	/*--- ACCESSORS ---*/
	public function getCreatedAtAttribute($value) {
		return date('l, M j Y, H:i:s', strtotime($value));
	}
	
	public function getUpdatedAtAttribute($value) {
		return date('l, M j Y, H:i:s', strtotime($value));
	}
	/*--- ACCESSORS ---*/
	
	/*--- MUTATORS ---*/
	//
	/*--- MUTATORS ---*/
	
	/*--- RELATIONSHIPS ---*/
	public function Author() {
		return $this->belongsTo(\App\Models\User::class, 'author_id');
	}
	
	public function Updater() {
		return $this->belongsTo(\App\Models\User::class, 'update_id');
	}
	
	public function Categories() {
		return $this->hasMany(BenefitCategory::class, 'type_id');
	}
	/*--- RELATIONSHIPS ---*/
	
	/*--- SCOPES ---*/
	public function scopeActive() {
		return $this->where('is_active', 1);
	}
	
	public function scopeCode($qry, $code) {
		return $qry->where('code', $code);
	}
	/*--- SCOPES ---*/
	
	protected static function boot() {
		parent::boot();
		static::addGlobalScope(new OrderScope);
	}
}