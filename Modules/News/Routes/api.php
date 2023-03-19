<?php

use Illuminate\Http\Request;
use Modules\News\Http\Controllers\CategoryController;
use Modules\News\Http\Controllers\NewsController;
use Modules\News\Http\Controllers\TagController;

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


// Route::delete('categories', [CategoryController::class, 'delete'])->name('categories.delete');
// Route::put('categories/{sponser}/order', [CategoryController::class, 'updateOrder'])->name('categories.updateOrder');
// Route::put('categories/{sponser}/active', [CategoryController::class, 'updateActive'])->name('categories.updateActive');
// Route::resource('categories', CategoryController::class)->except('edit', 'create', 'delete');

Route::controller(CategoryController::class)->group(function () {
    Route::put('categories/{id}/active','activeToggle');
    Route::delete('categories/{id}/restore','restore');
});
Route::resource('categories', CategoryController::class);

Route::controller(TagController::class)->group(function () {
  Route::put('tags/{id}/active','activeToggle');
  Route::delete('tags/{id}/restore','restore');
});
Route::resource('tags', TagController::class);

Route::controller(NewsController::class)->group(function () {
  Route::put('news/{id}/active','activeToggle');
  Route::delete('news/{id}/restore','restore');
});
Route::resource('news', NewsController::class);
