<?php

use Illuminate\Http\Request;
use Modules\CommonData\Http\Controllers\SponserController;
use Modules\CommonData\Http\Controllers\PermissionsController;
use Modules\CommonData\Http\Controllers\RoleController;

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

// Route::middleware('auth:api')->get('/sponser', function (Request $request) {
//     return $request->user();
// });


// Route::delete('sponsers', [SponserController::class, 'delete'])->name('sponsers.delete');
// Route::put('sponsers/{sponser}/order', [SponserController::class, 'updateOrder'])->name('sponsers.updateOrder');
// Route::put('sponsers/{sponser}/active', [SponserController::class, 'updateActive'])->name('sponsers.updateActive');
// Route::resource('sponsers', SponserController::class)->except('edit', 'create', 'delete');

Route::controller(SponserController::class)->group(function () {
    Route::put('sponsers/{id}/active','activeToggle');
    Route::delete('sponsers/{id}/restore','restore');
});
Route::resource('sponsers', SponserController::class);

