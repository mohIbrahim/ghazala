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
    						'address',
    						'comments',
    						'creator_user_id',
    						];

    protected $dates = ['rent_from', 'rent_to'];

    /**
     * [setRentFromAttribute description]
     * @param [type] $date [description]
     */
    public function setRentFromAttribute($date){
        if($date != "")
            $this->attributes['rent_from'] = Carbon::parse($date);
        else
            $this->attributes['rent_from'] = null;
    }

    /**
     * [setRentToAttribute description]
     * @param [type] $date [description]
     */
    public function setRentToAttribute($date){
        if($date != "")
            $this->attributes['rent_to'] = Carbon::parse($date);
        else
            $this->attributes['rent_to'] = null;
    }

    /**
     * [model description]
     * @return [type] [description]
     */
    public function model()
    {
        return $this->belongsTo('App\UnitModel', 'model_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_user_id', 'id');
    }
}
