<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigationPrivilages();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    private function composeNavigationPrivilages()
    {
        $v = [  
                'home',
                'layouts.main_nav.nav',
                'roles.show',
                'users.show',
                'permissions.show',

                'role_user._form',

                'unit_models.show',
                'unit_models.index',

                'units.show',
                'units.show2',
                'units.index',
                'units.create',
                'units.edit',

                'owners.show',
                'owners.index',

                'owners_family_members.show',
                'owners_family_members.index',
                
                'membership_cards_for_individuals.show',
                'membership_cards_for_individuals.index',

                'entry_stickers_for_cars.show',
                'entry_stickers_for_cars.index',


                'renters.show',
                'renters.index',

                'renting_contracts.show',
                'renting_contracts.index',

                'gates.index',

                'jobs.show',

                'employees.show',
                'employees.index',

                'complaints.show',
                'complaints.index',
            ];

        view()->composer($v, function($view){

            $permissions = [];

            $aUser = Auth::user();
            if(isset($aUser))
            {
                $firstRole = $aUser->roles()->first();
                if( isset($firstRole) )
                {
                    $permissions = $aUser->roles()->first()->permissions()->pluck('name')->toArray();
                }
            }

            $view->with('permissions', $permissions);

        });
    }
}
