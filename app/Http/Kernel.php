<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        
        'privileges'                            =>  \App\Http\Middleware\Privileges::class,
        'roles'                                 =>  \App\Http\Middleware\Roles::class,        
        'users'                                 =>  \App\Http\Middleware\Users::class,        
        'role_user'                             =>  \App\Http\Middleware\RoleUser::class,
        'unit_models'                           =>  \App\Http\Middleware\UnitModels::class,
        'units'                                 =>  \App\Http\Middleware\Units::class,
        'owners'                                =>  \App\Http\Middleware\Owners::class,
        'owners_family_members'                 =>  \App\Http\Middleware\OwnersFamilyMembers::class,
        'membership_cards_for_individuals'      =>  \App\Http\Middleware\MembershipCardsForIndividuals::class,
        'entry_stickers_for_cars'               =>  \App\Http\Middleware\EntryStickersForCars::class,
        'renters'                               =>  \App\Http\Middleware\Renters::class,
        'renting_contracts'                     =>  \App\Http\Middleware\RentingContracts::class,
        'gates'                                 =>  \App\Http\Middleware\Gates::class,
        'jobs'                                  =>  \App\Http\Middleware\Jobs::class,
        'employees'                             =>   \App\Http\Middleware\Employees::class,
        'departments'                           =>   \App\Http\Middleware\Departments::class,
    ];
}
