<?php

namespace App\Models\Partners;

use App\Scopes\OrderScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerRow extends Model
{
    use HasFactory, SoftDeletes;
	
	protected $fillable = [
		'type_id',
        'name', 
		'is_active', 
		'order', 
		'author_id', 
		'update_id', 
	];
	
	protected $casts = [
		'is_active' => 'boolean', 
		'order' => 'integer', 
		'author_id' => 'integer', 
		'update_id' => 'integer', 
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
		return $this->belongsTo(\User::class, 'author_id');
	}
	
	public function Updater() {
		return $this->belongsTo(\User::class, 'update_id');
	}
	
	public function Columns() {
		return $this->belongsToMany(PartnerColumn::class, 'partner_column_row', 'row_id', 'column_id')->withPivot('description');
	}
	/*--- RELATIONSHIPS ---*/
	
	/*--- LOCAL SCOPES ---*/
	public function scopeActive($query) {
        $query->where('is_active', 1);
    }
	/*--- LOCAL SCOPES ---*/
	
	protected static function boot() {
		parent::boot();
		static::addGlobalScope(new OrderScope);
	}
}
