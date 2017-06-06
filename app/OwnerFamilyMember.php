<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OwnerFamilyMember extends Model
{
    protected $table = 'owners_family_members';
    protected $fillable = ['name', 'slug', 'date_of_birth', 'owner_id', 'creator_user_id'];
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


    public function owner()
    {
        return $this->belongsTo('\App\Owner', 'owner_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo('\App\User', 'creator_user_id', 'id');
    }

}
