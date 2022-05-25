<?php

namespace App\Models\Partners;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PartnerColumnRow extends Pivot
{
    public $timestamps = false;
	
	protected $fillable = [
		'column_id', 
		'row_id', 
		'description', 
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
