<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";
    protected $fillable = ['name', 'comments', 'creator_user_id'];


    /**
     * [creator description]
     * @return [type] [description]
     */
    public function creator()
    {
        return $this->belongsTo('\App\User', 'creator_user_id', 'id');
    }


    public function jobs()
    {
        return $this->hasMany('\App\Jobs', 'job_id');
    }
}
