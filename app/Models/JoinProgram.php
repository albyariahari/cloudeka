<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JoinProgram extends Model {
    use HasFactory, SoftDeletes;
	
	protected $fillable = [
        'name', 
		'email', 
		'job_title', 
		'job_function', 
		'phone', 
		'sent_at', 
	];
	
	protected $casts = [
		'sent_at' => 'datetime', 
	];
	
	protected $appends = [
		'partnership_type_names', 
		'solution_interest_names', 
	];
	
	public $timestamps = false;
    
	/*--- ACCESSORS ---*/
	public function getSentAtAttribute($value) {
		return date('l, M j Y, H:i:s', strtotime($value));
	}
	
	public function getPartnershipTypeNamesAttribute() {
		return $this->PartnershipTypes->pluck('name')->implode(', ');
	}
	
	public function getSolutionInterestNamesAttribute() {
		return $this->SolutionInterests->pluck('name')->implode(', ');
	}
	/*--- ACCESSORS ---*/
	
	/*--- MUTATORS ---*/
	//
	/*--- MUTATORS ---*/
	
	/*--- RELATIONSHIPS ---*/
	public function PartnershipTypes() {
		return $this->belongsToMany(PartnershipType::class, 'join_program_partnership_type', 'join_program_id', 'partnership_type_id');
	}
	
	public function SolutionInterests() {
		return $this->belongsToMany(SolutionInterest::class, 'join_program_solution_interest', 'join_program_id', 'solution_interest_id');
	}
	/*--- RELATIONSHIPS ---*/
}