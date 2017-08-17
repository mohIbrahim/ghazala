<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Complaint extends Model
{
    protected $table = "complaints";
    protected $fillable	=	[
								'complainant_name',
								'complainant_phone',
								'title',
								'subject',
								'details',
								'status',
								'complaint_section',
								'end_date',
								'comments',
								'unit_id',
    						];
    protected $dates = ['end_date'];

    /**
     * [setEndDateAttribute description]
     * @param [type] $date [description]
     */
    public function setEndDateAttribute($date){
    	if($date != "")
            $this->attributes['end_date'] = Carbon::parse($date);
        else
            $this->attributes['end_date'] = null;
    }
}
