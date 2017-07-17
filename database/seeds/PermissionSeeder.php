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
        $this->membershipCardsForIndividuals();
        $this->entryStickersForCars();
        $this->renters();
        $this->rentingContracts();
        $this->gates();
        $this->finance();
        $this->jobs();

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

    private function membershipCardsForIndividuals()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_membership_cards_for_individuals",
            "slug"              =>"view-membership-cards-for-individuals",
            "descriptions"      =>"view membership cards for individuals",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_membership_cards_for_individuals",
            "slug"              =>"create-membership-cards-for-individuals",
            "descriptions"      =>"create membership cards for individuals",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_membership_cards_for_individuals",
            "slug"              =>"update-membership-cards-for-individuals",
            "descriptions"      =>"update membership cards for individuals",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_membership_cards_for_individuals",
            "slug"              =>"delete-membership-cards-for-individuals",
            "descriptions"      =>"delete membership cards for individuals",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }

    private function entryStickersForCars()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_entry_stickers_for_cars",
            "slug"              =>"view-entry-stickers-for-cars",
            "descriptions"      =>"view entry stickers for cars",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_entry_stickers_for_cars",
            "slug"              =>"create-entry-stickers-for-cars",
            "descriptions"      =>"create entry stickers for cars",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_entry_stickers_for_cars",
            "slug"              =>"update-entry-stickers-for-cars",
            "descriptions"      =>"update entry stickers for cars",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_entry_stickers_for_cars",
            "slug"              =>"delete-entry-stickers-for-cars",
            "descriptions"      =>"delete entry stickers for cars",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }


    private function renters()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_renters",
            "slug"              =>"view-renters",
            "descriptions"      =>"view renters",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_renters",
            "slug"              =>"create-renters",
            "descriptions"      =>"create renters",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_renters",
            "slug"              =>"update-renters",
            "descriptions"      =>"update renters",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_renters",
            "slug"              =>"delete-renters",
            "descriptions"      =>"delete renters",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }


    
    private function rentingContracts()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_renting_contracts",
            "slug"              =>"view-renting-contracts",
            "descriptions"      =>"view renting contracts",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_renting_contracts",
            "slug"              =>"create-renting-contracts",
            "descriptions"      =>"create renting contracts",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_renting_contracts",
            "slug"              =>"update-renting-contracts",
            "descriptions"      =>"update renting contracts",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_renting_contracts",
            "slug"              =>"delete-renting-contracts",
            "descriptions"      =>"delete renting contracts",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }


     private function gates()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_gates",
            "slug"              =>"view-gates",
            "descriptions"      =>"view gates",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_gates",
            "slug"              =>"create-gates",
            "descriptions"      =>"create gates",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_gates",
            "slug"              =>"update-gates",
            "descriptions"      =>"update gates",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_gates",
            "slug"              =>"delete-gates",
            "descriptions"      =>"delete gates",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }


    private function finance()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_finance",
            "slug"              =>"view-finance",
            "descriptions"      =>"view finance",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_finance",
            "slug"              =>"create-finance",
            "descriptions"      =>"create finance",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_finance",
            "slug"              =>"update-finance",
            "descriptions"      =>"update finance",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_finance",
            "slug"              =>"delete-finance",
            "descriptions"      =>"delete finance",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }


    private function jobs()
    {
        DB::table('permissions')->insert([
            "name"              =>"view_jobs",
            "slug"              =>"view-jobs",
            "descriptions"      =>"view jobs",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"create_jobs",
            "slug"              =>"create-jobs",
            "descriptions"      =>"create jobs",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"update_jobs",
            "slug"              =>"update-jobs",
            "descriptions"      =>"update jobs",
            "created_at"=>Carbon\Carbon::now(),
            ]);        
        DB::table('permissions')->insert([
            "name"              =>"delete_jobs",
            "slug"              =>"delete-jobs",
            "descriptions"      =>"delete jobs",
            "created_at"=>Carbon\Carbon::now(),
            ]);
    }













}