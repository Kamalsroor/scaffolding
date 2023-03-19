<?php

use Illuminate\Http\Request;
use Modules\Setting\Http\Controllers\DashboardController;
use Modules\Setting\Http\Controllers\SettingController;
use Modules\Setting\Http\Controllers\PermissionsController;
use Modules\Setting\Http\Controllers\RoleController;

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



Route::controller(SettingController::class)->group(function () {
    Route::get('settings','index');
    Route::get('settings/{page}','page');
    Route::put('update/settings','update');

});
Route::group(['prefix' => 'dashboard'], function () {

  Route::controller(DashboardController::class)->group(function () {
    Route::get('overview-data','overviewData');
  });
});

