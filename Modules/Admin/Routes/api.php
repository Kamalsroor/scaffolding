<?php

use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;

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

// Route::middleware('auth:api')->get('/admin', function (Request $request) {
//     return $request->user();
// });


// Route::delete('admins', [AdminController::class, 'delete'])->name('admins.delete');
// Route::put('admins/{admin}/order', [AdminController::class, 'updateOrder'])->name('admins.updateOrder');
// Route::put('admins/{admin}/active', [AdminController::class, 'updateActive'])->name('admins.updateActive');
// Route::resource('admins', AdminController::class)->except('edit', 'create', 'delete');

Route::controller(AdminController::class)->group(function () {
    Route::put('admins/{id}/active','activeToggle');
    Route::delete('admins/{id}/restore','restore');
});
Route::resource('admins', AdminController::class);
