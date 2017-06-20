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

}
