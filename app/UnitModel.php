<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UnitModel extends Model
{



    protected $table = "unit_models";
    protected $fillable = ['name',
							'slug',
							'type',
							'total_area',
							'net_area',
							'number_of_rooms',
							'number_of_floors',
							'number_of_toilets',
							'number_of_balconies',
							'number_of_kitchens',
							'finishing_type',
							'garden',
							'garden_area',
							'pool',
							'pool_area',
							'comments',
							'creator_user_id'];
	/**
	 * [creator description]
	 * @return [type] [description]
	 */
	public function creator()
	{
		return $this->belongsTo('App\User', 'creator_user_id','id');
	}

	/**
	 * [units description]
	 * @return [type] [description]
	 */
    public function units()
    {
    	return $this->hasMany('App\Unit', 'model_id', 'id');
    }

}
