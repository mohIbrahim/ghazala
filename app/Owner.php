<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Owner extends Model
{
    protected $table = 'owners';

    protected $fillable = 	[	
    							'name',
    							'slug',
    							'ssn',
    							'date_of_birth',
    							'mobile_1',
    							'mobile_2',
    							'telephone',
    							'email',
    							'work_email',
    							'contact_person_name',
    							'contact_person_phone',
    							'address',
    							'occupation',
    							'bank_account_number',
    							'personal_image',
    							'contract_image',
    							'contract_date',
    							'owner_status',
    							'comments',
    							'creator_user_id'];

    protected $dates = ['date_of_birth', 'contract_date'];


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
     * [setContractDateAttribute description]
     * @param [type] $date [description]
     */
    public function setContractDateAttribute($date){
    	if($date != "")
            $this->attributes['contract_date'] = Carbon::parse($date);
        else
            $this->attributes['contract_date'] = null;
    }



}
