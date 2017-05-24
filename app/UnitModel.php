<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UnitModel extends Model
{



    protected $table = "unit_models";
    protected $fillable = [
		'name',
		'slug',
		'total_area',
		'net_area',
		'number_of_rooms',
		'number_of_flooers',
		'number_of_toilets',
		'number_of_balconies',
		'number_of_kitchens',
		'finshing_type',
		'garden',
		'garden_area',
		'pool',
		'pool_area',
		'comments',
		'creator_user_id'
    ];

    

}
