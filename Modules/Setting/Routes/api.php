<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/setting', function (Request $request) {
//     return $request->user();
// });


// Route::delete('settings', [SettingController::class, 'delete'])->name('settings.delete');
// Route::put('settings/{setting}/order', [SettingController::class, 'updateOrder'])->name('settings.updateOrder');
// Route::put('settings/{setting}/active', [SettingController::class, 'updateActive'])->name('settings.updateActive');
// Route::resource('settings', SettingController::class)->except('edit', 'create', 'delete');

Route::controller(SettingController::class)->group(function () {
    Route::put('settings/{id}/active','activeToggle');
    Route::delete('settings/{id}/restore','restore');
});
Route::resource('settings', SettingController::class);

Route::controller(RoleController::class)->group(function () {
    Route::put('roles/{id}/active','activeToggle');
    Route::delete('roles/{id}/restore','restore');
});
Route::resource('roles', RoleController::class);

Route::resource('permissions', PermissionsController::class , ['only' => ['index']]);
