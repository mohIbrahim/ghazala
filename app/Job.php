<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "ghazala_jobs";
    protected $fillable = ['name', 'department', 'descriptions', 'comments', 'creator_user_id'];


    /**
     * [creator description]
     * @return [type] [description]
     */
    public function creator()
    {
        return $this->belongsTo('\App\User', 'creator_user_id', 'id');
    }


    public function employees()
    {
        return $this->belongsToMany('\App\Employee', 'employee_job')->withTimestamps();
    }
}
