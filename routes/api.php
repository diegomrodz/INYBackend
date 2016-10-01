<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::group([
	'namespace' => 'Api',
	'middleware' => 'auth:api'
], function () {

	Route::group([
		'prefix' => 'mobile'
	], function () {

		Route::group([
			'prefix' => 'dashboard'
		], function () {

			Route::get('/patients', 'MobileDashboardController@getPatients');

			Route::get('/notifications/{patientId}', 'MobileDashboardController@getNotifications');

		});

	});

	Route::group([
		'prefix' => 'device-panel'
	], function () {

		Route::get('/status_change/{deviceId}/for/{patientId}', 'DevicePanelController@deviceChanges');

		Route::get('/status_of/{deviceId}/for/{patientId}', 'DevicePanelController@statusOf');

		Route::get('/move_left/{deviceId}/for/{patientId}', 'DevicePanelController@moveLeft');

		Route::get('/move_right/{deviceId}/for/{patientId}', 'DevicePanelController@moveRight');

		Route::get('/move_down/{deviceId}/for/{patientId}', 'DevicePanelController@moveDown');

		Route::get('/move_up/{deviceId}/for/{patientId}', 'DevicePanelController@moveUp');

		Route::get('/move_to_start/{deviceId}/for/{patientId}', 'DevicePanelController@moveToStart');


	});

});