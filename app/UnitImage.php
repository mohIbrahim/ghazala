<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitImage extends Model
{
	protected $table = "units_images";
	protected $fillable = ['unit_image', 'unit_id'];
}
