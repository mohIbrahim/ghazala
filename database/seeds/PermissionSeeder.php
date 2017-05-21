<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->permissions();
        $this->users();
        $this->roles();        
    }

    /**
     * Create permissions Privilages
     * @return void
     */
    private function permissions()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_permissions",
            "slug"              =>"view-permissions",
            "descriptions"      =>"view permissions",
            "created_at"        =>Carbon\Carbon::now(),
            ]);
        DB::table('permissions')->insert([
            "name"              =>"create_permissions",
            "slug"              =>"create-permissions",
            "descriptions"      =>"create permissions",
            "created_at"=>Carbon\Carbon::now(),
            ]);
        DB::table('permissions')->insert([
            "name"              =>"update_permissions",
            "slug"              =>"update-permissions",
            "descriptions"      =>"update permissions",
            "created_at"=>Carbon\Carbon::now(),
            ]);
        DB::table('permissions')->insert([
            "name"              =>"delete_permissions",
            "slug"              =>"delete-permissions",
            "descriptions"      =>"delete permissions",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }
     /**
     * Create permissions Users
     * @return void
     */
     private function users()
     {
        DB::table('permissions')->insert([
            "name"              =>"view_users",
            "slug"              =>"view-users",
            "descriptions"      =>"view users",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_users",
            "slug"              =>"create-users",
            "descriptions"      =>"create users",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_users",
            "slug"              =>"update-users",
            "descriptions"      =>"update users",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_users",
            "slug"              =>"delete-users",
            "descriptions"      =>"delete users",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }

    /**
     * Create permissions Roles
     * @return void
     */
    private function roles()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_roles",
            "slug"              =>"view-roles",
            "descriptions"      =>"view roles",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_roles",
            "slug"              =>"create-roles",
            "descriptions"      =>"create roles",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_roles",
            "slug"              =>"update-roles",
            "descriptions"      =>"update roles",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_roles",
            "slug"              =>"delete-roles",
            "descriptions"      =>"delete roles",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }





}