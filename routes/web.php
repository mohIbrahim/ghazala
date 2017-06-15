<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

//Authentications routes
	Auth::routes();
//HomeController
	Route::get('/', 'HomeController@welcome')->name('welcome');
	Route::get('/home', 'HomeController@index')->name('home');
//Privileges
	Route::resource('roles', 'RoleController');
	Route::resource('permissions', 'PermissionController');
	Route::resource('users', 'UserController');
	Route::resource('role_user', 'RoleUserController');
//Unit Models
 	Route::resource('unit_models', 'UnitModelsController');
 //Unit Models
 	Route::resource('units', 'UnitsController');
 //Owner
 	Route::resource('owners', 'OwnersController');
 	Route::get('owners_index_ajax', 'OwnersController@indexAjax')->name('owners_index_ajax');
 //Owner Family Members
 	Route::resource('owners_family_members', 'OwnersFamilyMembersController');
 //Membership Cards For Individuals
 	Route::resource('membership_cards_for_individuals', 'MembershipCardsForIndividualsController');
 	Route::get('membership_cards_for_individual_index_ajax', 'MembershipCardsForIndividualsController@indexAjax')->name('membership_cards_for_individual_index_ajax');
 //Entry Stickers For Cars
 	Route::resource('entry_stickers_for_cars', 'EntryStickersForCarsController');
 	Route::get('entry_stickers_for_cars_index_ajax', 'EntryStickersForCarsController@indexAjax')->name('entry_stickers_for_cars_index_ajax');
 	