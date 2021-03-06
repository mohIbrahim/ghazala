<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
	protected $table = 'renters';
	protected $fillable	=	[
								"ssn",
								"name",
								"slug",
								"mobile_1",
								"mobile_2",
								"telephone",
								"email",
								"address",
								"occupation",
								"comments",
								"creator_user_id",
							];

	/**
	 * [units description]
	 * @return [type] [description]
	 */
	public function units()
	{
		return $this->hasMany('\App\Unit', 'renter_id');
	}

	/**
	 * [creator description]
	 * @return [type] [description]
	 */
	public function creator()
	{
		return $this->belongsTo('\App\User', 'creator_user_id');
	}

	
}
