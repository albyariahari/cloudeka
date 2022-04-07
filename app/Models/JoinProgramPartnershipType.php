<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class JoinProgramPartnershipType extends Pivot
{
    public $timestamps = false;
	
	protected $fillable = [
		'join_program_id', 
		'partnership_type_id', 
	];
	
	/*--- ACCESSORS ---*/
	//
	/*--- ACCESSORS ---*/
	
	/*--- MUTATORS ---*/
	//
	/*--- MUTATORS ---*/
	
	/*--- RELATIONSHIPS ---*/
	//
	/*--- RELATIONSHIPS ---*/
}
