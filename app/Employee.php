<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected	$table 		=	"employees";
    protected	$fillable 	=	[	
		    						'name', 
		    						'slug',
		    						'ssn', 
		    						'city',
		    						'address',
		    						'gender', 
		    						'phone', 
		    						'date_of_birth',
		    						'personl_image', 
		    						'date_of_hiring',
		    						'salary', 
		    						'status',
		    						'comments',
    							];

	protected	$dates 		=	['date_of_birth', 'date_of_hiring'];


	/**
     * [setDateOfBirthAttribute description]
     * @param [type] $date [description]
     */
    public function setDateOfBirthAttribute($date){
    	if($date != "")
            $this->attributes['date_of_birth'] = Carbon::parse($date);
        else
            $this->attributes['date_of_birth'] = null;
    }

    /**
     * [setDateOfHiringAttribute description]
     * @param [type] $date [description]
     */
    public function setDateOfHiringAttribute($date){
    	if($date != "")
            $this->attributes['date_of_hiring'] = Carbon::parse($date);
        else
            $this->attributes['date_of_hiring'] = null;
    }

    // /**
    //  * Form model biding for jobs names ids 
    //  * @return [type] [description]
    //  */
    // public function getJobsAttribute()
    // {
    //     return $this->units->pluck('id');
    // }
}
