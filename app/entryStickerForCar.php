<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EntryStickerForCar extends Model
{
    protected $table = 'entry_stickers_for_cars';

    protected $fillable =	[	
    							"code",
								"car_owner",
								"release_date",
								"plate_number",
								"the_manufacture_company",
								"type",
								"model",
								"color",
								"status",
								"comments",
								"creator_user_id",
								"owner_id",
							];


	protected $dates = ["release_date"];

	/**
	 * [setReleaseDateAttribute description]
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
}
