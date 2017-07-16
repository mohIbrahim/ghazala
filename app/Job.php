<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "jobs";
    protected $fillable = ['name', 'descriptions', 'comments', 'creator_user_id'];


    /**
     * [creator description]
     * @return [type] [description]
     */
    public function creator()
    {
        return $this->belongsTo('\App\User', 'creator_user_id', 'id');
    }
}
