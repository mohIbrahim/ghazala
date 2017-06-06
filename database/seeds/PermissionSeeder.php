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
        $this->unitModels();
        $this->units();
        $this->owners();
        $this->ownersFamilyMembers();

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
   

    /**
     * [unitModels description]
     * @return [type] [description]
     */
    private function unitModels()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_unit_models",
            "slug"              =>"view-unit-models",
            "descriptions"      =>"view unit models",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_unit_models",
            "slug"              =>"create-unit-models",
            "descriptions"      =>"create unit models",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_unit_models",
            "slug"              =>"update-unit-models",
            "descriptions"      =>"update unit models",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_unit_models",
            "slug"              =>"delete-unit-models",
            "descriptions"      =>"delete unit models",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }


    private function units()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_units",
            "slug"              =>"view-units",
            "descriptions"      =>"view units",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_units",
            "slug"              =>"create-units",
            "descriptions"      =>"create units",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_units",
            "slug"              =>"update-units",
            "descriptions"      =>"update units",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_units",
            "slug"              =>"delete-units",
            "descriptions"      =>"delete units",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }

    private function owners()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_owners",
            "slug"              =>"view-owners",
            "descriptions"      =>"view owners",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_owners",
            "slug"              =>"create-owners",
            "descriptions"      =>"create owners",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_owners",
            "slug"              =>"update-owners",
            "descriptions"      =>"update owners",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_owners",
            "slug"              =>"delete-owners",
            "descriptions"      =>"delete owners",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }

    private function ownersFamilyMembers()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_owners_family_members",
            "slug"              =>"view-owners-family-members",
            "descriptions"      =>"view owners family members",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_owners_family_members",
            "slug"              =>"create-owners-family-members",
            "descriptions"      =>"create owners family members",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_owners_family_members",
            "slug"              =>"update-owners-family-members",
            "descriptions"      =>"update owners family members",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_owners_family_members",
            "slug"              =>"delete-owners-family-members",
            "descriptions"      =>"delete owners family members",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }







}