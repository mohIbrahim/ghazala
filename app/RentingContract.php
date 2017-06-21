<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RentingContract extends Model
{
    protected $table = 'renting_contracts';
    protected $fillable =	[
								"from",
								"to",
								"soft_copy",
								"comments",
                                "creator_user_id",
                                "renter_id",
								"unit_id",
    						];
    protected $dates = ['from', 'to'];


    /**
     * [setFromAttribute description]
     * @param [type] $date [description]
     */
    public function setFromAttribute($date){
    	if($date != "")
            $this->attributes['from'] = Carbon::parse($date);
        else
            $this->attributes['from'] = null;
    }

    /**
     * [setToAttribute description]
     * @param [type] $date [description]
     */
    public function setToAttribute($date){
    	if($date != "")
            $this->attributes['to'] = Carbon::parse($date);
        else
            $this->attributes['to'] = null;
    }

    /**
     * [creator description]
     * @return [type] [description]
     */
    public function creator()
    {
        return $this->belongsTo('\App\User', 'creator_user_id', 'id');
    }

    /**
     * [unit description]
     * @return [type] [description]
     */
    public function unit()
    {
        return $this->hasOne('\App\Unit', 'id', 'unit_id');
    }

    /**
     * [renter description]
     * @return [type] [description]
     */
    public function renter()
    {
        return $this->hasOne('\App\Renter', 'id', 'renter_id');
    }

}
