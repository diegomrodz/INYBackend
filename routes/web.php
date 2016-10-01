<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
	Auth::logout();

	return redirect()->to('/');
});

Auth::routes();

Route::group([
	'namespace' => 'Auth',
	'prefix' => 'auth'
], function () {

	Route::post('/api_login', 'LoginController@apiLogin');

});

Route::get('/home', 'HomeController@index');

Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => 'type:admin'
], function () {

	Route::get('/', 'DashboardController');
	Route::get('/oauth', 'OAuthController');
	Route::get('/users', 'UsersController');
	Route::get('/caretakers', 'CaretakersController');
	Route::get('/patients', 'PatientsController');
	Route::get('/devices', 'DevicesController');
	Route::get('/schedules', 'SchedulesController');
	Route::get('/home_cares', 'HomeCaresController');

});

Route::group([
	'prefix' => 'home_care',
	'namespace' => 'HomeCare',
	'middleware' => 'type:home_care'
], function () {

	Route::get('/', 'DashboardController');

	Route::get('/home', 'HomeCareController');
	Route::get('/schedule', 'ScheduleController');

});

Route::group([
	'prefix' => 'device-panel',
	'namespace' => 'DevicePanel'
], function () {

	Route::get('/{deviceId}/current', 'DevicePanelController@getCurrent');

	Route::get('/{deviceId}/for/{patientId}', 'DevicePanelController@getIndex');

});