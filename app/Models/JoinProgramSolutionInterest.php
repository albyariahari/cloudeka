<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class JoinProgramSolutionInterest extends Pivot
{
    public $timestamps = false;
	
	protected $fillable = [
		'join_program_id', 
		'solution_interest_id', 
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
