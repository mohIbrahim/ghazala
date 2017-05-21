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
        'layouts.nav.nav',
        'roles.show',
        'users.show',
        'permissions.show',

        'role_user._form',

        'home',
        'welcome',
        'sellers.show',
        'products.show',
        'customers.show',

        'about_us',
        
        'news.show',
        'news.review',

        'sub_products.show',

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
