<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerFamilyMember extends Model
{
    protected $fillable = ['name', 'date_of_birth', 'creator_user_id'];
    protected $dates = ['date_of_birth'];


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

}
