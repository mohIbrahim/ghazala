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
            'layouts.main_nav.nav',
            'roles.show',
            'users.show',
            'permissions.show',

            'role_user._form',

            'unit_models.show',
            'unit_models.index',

            'units.show',
            'units.index',

            'owners.show',
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
