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
//Unit
 	Route::resource('units', 'UnitsController');
 	Route::get('units_index_ajax', 'UnitsController@indexAjax')->name('units_index_ajax');
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
//Renters
 	Route::resource('renters', 'RentersController');
 	Route::get('renters_index_ajax', 'RentersController@indexAjax')->name('renters_index_ajax');
//Renting Contracts
 	Route::resource('renting_contracts', 'RentingContractsController');
 	Route::get('renting_contracts_index_ajax', 'RentingContractsController@indexAjax')->name('renting_contracts_index_ajax');
//Data Entry
 	Route::resource('data_entry', 'DataEntryController');
//Gates
 	Route::resource('gates', 'GatesReportsController');
 	Route::get('gates_index_ajax', 'GatesReportsController@indexAjax')->name('gates_index_ajax');
//Jobs
 	Route::resource('jobs', 'JobsController');
//Employees
 	Route::resource('employees', 'EmployeesController');
 	Route::get('employees_gates_index_ajax', 'EmployeesController@indexAjax')->name('employees_gates_index_ajax');
//Departments
 	Route::resource('departments', 'DepartmentsController');

//Reports
 	//Units Debts
 		Route::get('reports/units_debts/debts_notifire', 'UnitsDebtReportsController@getDebtsNotifier');
 		Route::post('reports/units_debts/notify', 'UnitsDebtReportsController@notify');


