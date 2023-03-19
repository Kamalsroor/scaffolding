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

// Route::middleware('auth:api')->get('/setting', function (Request $request) {
//     return $request->user();
// });


// Route::delete('settings', [SettingController::class, 'delete'])->name('settings.delete');
// Route::put('settings/{setting}/order', [SettingController::class, 'updateOrder'])->name('settings.updateOrder');
// Route::put('settings/{setting}/active', [SettingController::class, 'updateActive'])->name('settings.updateActive');
// Route::resource('settings', SettingController::class)->except('edit', 'create', 'delete');

Route::controller(SettingController::class)->group(function () {
    Route::get('settings','index');
});

