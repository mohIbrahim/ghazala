<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Unit extends Model
{
    protected $table = "units";

    protected $fillable = ['code',
    						'model_id', 
    						'for_sale',
    						'sale_details',
    						'sale_price',
    						'for_rent',
    						'rent_from',
    						'rent_to',
    						'rent_price',
    						'rent_details',
    						'unit_account_code',
    						'direction',
    						'floor_number',
    						'electricity_meter_number',
    						'comments',
    						'creator_user_id',
    						];

    protected $dates = ['rent_from', 'rent_to'];


    public function setRentFromAttribute($date){
        if($date != "")
            $this->attributes['rent_from'] = Carbon::parse($date);
        else
            $this->attributes['rent_from'] = "0000-00-00 00:00:00";
    }

    public function setRentToAttribute($date){
        if($date != "")
            $this->attributes['rent_to'] = Carbon::parse($date);
        else
            $this->attributes['rent_to'] = "0000-00-00 00:00:00";
    }
}
