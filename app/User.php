<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'personal_image', 'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
    * Get roles associated with this user.
    *
    * @param
    * @return \App\Role
    */
    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    /**
     *  Get and bind user role edit form
     *
     *  @return integer role_id 
     */
    
    public function getRoleAttribute(){
        
        $rolesIDs = $this->roles()->pluck('role_id')->toArray();
        $selected = 0;
        if(!empty($rolesIDs)){
            $selected = $rolesIDs[0];
        }
        return $selected;
    }
}
