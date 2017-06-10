<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MembershipCardForIndividual extends Model
{
    protected $table = "membership_cards_for_individuals";
    protected $fillable  = ['serial', 
    						'type', 
    						'release_date', 
    						'status', 
    						'delivered', 
    						'delivered_date', 
    						'comments', 
                            'owner_id', 
    						'unit_id', 
    						'creator_user_id', ];

    protected $dates = ['release_date', 'delivered_date'];
    


    /**
     * [setReleasDateAttribute description]
     * @param [type] $date [description]
     */
    public function setReleaseDateAttribute($date)
    {        
    	if($date != "")
            $this->attributes['release_date'] = Carbon::parse($date);
        else
            $this->attributes['release_date'] = null;
    }

    /**
     * [setDeliveredDateAttribute description]
     * @param [type] $date [description]
     */
    public function setDeliveredDateAttribute($date)
    {
        if($date != "")
            $this->attributes['delivered_date'] = Carbon::parse($date);
        else
            $this->attributes['delivered_date'] = null;
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
     * [owner description]
     * @return [type] [description]
     */
    public function owner()
    {
        return $this->belongsTo('\App\Owner', 'owner_id', 'id');
    }

    /**
     * [unit description]
     * @return [type] [description]
     */
    public function unit()
    {
        return $this->belongsTo('\App\Unit', 'unit_id', 'id');
    }

    
}
