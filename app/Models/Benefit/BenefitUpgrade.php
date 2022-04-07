<?php

namespace App\Models\Benefit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\OrderScope;

class BenefitUpgrade extends Model {
    use HasFactory, SoftDeletes;
	
	protected $fillable = [
        'name', 
		'code', 
		'hint',
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
	
	public function Category() {
		return $this->belongsTo(BenefitCategory::class, 'category_id');
	}
	
	public function Levels() {
		return $this->belongsToMany(BenefitLevel::class, 'benefit_upgrade_benefit_level', 'upgrade_id', 'level_id');
	}
	/*--- RELATIONSHIPS ---*/
	
	/*--- SCOPES ---*/
	public function scopeActive() {
		return $this->where('is_active', 1);
	}
	
	public function scopeCode($qry, $code) {
		return $qry->where('code', $code);
	}
	
	public function scopeParent($qry, $id) {
		return $qry->where('category_id', $id);
	}
	/*--- SCOPES ---*/
	
	protected static function boot() {
		parent::boot();
		static::addGlobalScope(new OrderScope);
	}
}