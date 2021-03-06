<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\Permission;

class DeveloperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
    	$moh = new User();    	
    	$moh->name = "Mohammed Ibrahim Fawzy";
    	$moh->email = "mohibrahimqop@gmail.com";
        $moh->password = bcrypt("123456789");
    	$moh->slug = str_slug($moh->name);
    	$moh->save();

    	$role = new Role();
        $role->name = "Developer";
        $role->slug = str_slug($role->name);
    	$role->descriptions = "Developer role";
    	$role->save();

    	$moh->roles()->attach($role);
    	$permissions = Permission::all();

    	foreach ($permissions as $permission) {
    		$role->permissions()->attach($permission);
    	}        
    }
}
