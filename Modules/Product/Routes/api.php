<?php

use Illuminate\Http\Request;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\PermissionsController;
use Modules\Product\Http\Controllers\RoleController;

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

// Route::middleware('auth:api')->get('/product', function (Request $request) {
//     return $request->user();
// });


// Route::delete('products', [ProductController::class, 'delete'])->name('products.delete');
// Route::put('products/{product}/order', [ProductController::class, 'updateOrder'])->name('products.updateOrder');
// Route::put('products/{product}/active', [ProductController::class, 'updateActive'])->name('products.updateActive');
// Route::resource('products', ProductController::class)->except('edit', 'create', 'delete');

Route::controller(ProductController::class)->group(function () {
    Route::put('products/{id}/active','activeToggle');
    Route::delete('products/{id}/restore','restore');
});
Route::resource('products', ProductController::class);

