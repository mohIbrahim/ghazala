<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
{
    protected	$table 		=	"employees";
    protected	$fillable 	=	[	
                                    'code', 
		    						'name', 
		    						'slug',
                                    'ssn', 
		    						'phone', 
                                    'city',
                                    'address',
                                    'gender', 
                                    'date_of_birth',
                                    'contact_person_name',
		    						'contact_person_phone',
		    						'personal_image', 
		    						'date_of_hiring',
		    						'salary', 
		    						'status',
                                    'comments',
		    						'creator_user_id',

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
    
    
    /**
     * [jobs description]
     * @return [type] [description]
     */
    public function jobs()
    {
        return  $this->belongsToMany('\App\Job', 'employee_job')->withTimestamps();
    }
}
