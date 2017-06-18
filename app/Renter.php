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
		return $this->hasMany('\App\Unit', 'unit_id');
	}

	
}
