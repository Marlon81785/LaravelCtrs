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

Route::group(['middleware' => ['auth']], function () {

	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	

	Route::group(['middleware' => ['roles']], function () {

		Route::any('/perfil', 'ProfilesController@perfil');
		Route::post('/profiles/default', 'ProfilesController@defaultProfile');
		Route::get('/reports/generate/{id}', 'ReportsController@generate');
		

		Route::resource('users', 'UsersController');
		Route::resource('reports', 'ReportsController');
		Route::resource('indicators', 'IndicatorsController');
		Route::resource('permissions', 'PermissionsController');
		Route::resource('profiles', 'ProfilesController');
		Route::resource('logs', 'LogsController');
		
		Route::resource('registerPacient', 'registerPacientController');
		Route::resource('registerCid', 'registerCidController');
		Route::resource('registerAnaminese', 'registerAnamineseController');
		Route::resource('registerDrugs', 'registerDrugsController');
		Route::resource('registerDoctor', 'registerDoctorController');
		Route::resource('lme', 'lmeController');
		Route::resource('lme/create', 'lmeCreateController');
		Route::resource('lme/save', 'lmeSaveController');//save new lme
		
	});
	
});

Auth::routes();
