<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Unit extends Model
{
    protected $table = "units";

    protected $fillable = ['code',
                            'model_id', 
    						'renter_id', 
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
                            'the_current_unit_debt',
                            'date_of_indebtedness',
    						'comments',
    						'creator_user_id',
                            'unit_expenses',
                            'garden_maintenance_expenses',
                            'staff_housing_expenses',
                            'debt_benefits',
                            'balances_of_previous_years',
    						];

    protected $dates = ['rent_from', 'rent_to', 'date_of_indebtedness'];

    /**
     * [setRentFromAttribute description]
     * @param [type] $date [description]
     */
    public function setRentFromAttribute($date)
    {
        if($date != "")
            $this->attributes['rent_from'] = Carbon::parse($date);
        else
            $this->attributes['rent_from'] = null;
    }

    /**
     * [setRentToAttribute description]
     * @param [type] $date [description]
     */
    public function setRentToAttribute($date)
    {
        if($date != "")
            $this->attributes['rent_to'] = Carbon::parse($date);
        else
            $this->attributes['rent_to'] = null;
    }

    /**
     * [setDateOfIndebtednessAttribute description]
     * @param [type] $date [description]
     */
    public function setDateOfIndebtednessAttribute($date)
    {
        if($date != "")
            $this->attributes['date_of_indebtedness'] = Carbon::parse($date);
        else
            $this->attributes['date_of_indebtedness'] = null;
    }

    /**
     * [model description]
     * @return [type] [description]
     */
    public function model()
    {
        return $this->belongsTo('App\UnitModel', 'model_id', 'id');
    }
    /**
     * Return the user who create this unit
     * @return [type] [description]
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_user_id', 'id');
    }

    /**
     * Get Unit Images from multi valued attribute that converted to (one to many relationship)
     * @return [UnitImage] [description]
     */
    public function images()
    {
        return $this->hasMany('\App\UnitImage', 'unit_id', 'id');
    }
    
    /**
     * Get the owners associated with the given unit
     * @return [type] [description]
     */
    public function owners()
    {
        return $this->belongsToMany('\App\Owner', 'owner_unit');
    }

    /**
     * [renter description]
     * @return [type] [description]
     */
    public function renter()
    {
        return $this->belongsTo('\App\Renter', 'renter_id');
    }

}
