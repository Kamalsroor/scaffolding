<?php

use Illuminate\Http\Request;
use Modules\CommonData\Http\Controllers\ContactUsController;
use Modules\CommonData\Http\Controllers\SponserController;
use Modules\CommonData\Http\Controllers\SubscribeController;
use Modules\CommonData\Http\Controllers\PermissionsController;
use Modules\CommonData\Http\Controllers\RoleController;
use Modules\CommonData\Http\Controllers\SliderController;

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
    Route::put('sponsers/{id}/feature','featureToggle');
    Route::delete('sponsers/{id}/restore','restore');
});
Route::resource('sponsers', SponserController::class);

Route::controller(SubscribeController::class)->group(function () {
  Route::put('subscription/{id}/active','activeToggle');
  Route::delete('subscription/{id}/restore','restore');
});
Route::resource('subscription', SubscribeController::class);

Route::controller(ContactUsController::class)->group(function () {
  Route::put('contact_us/{id}/active','activeToggle');
  Route::delete('contact_us/{id}/restore','restore');
});
Route::resource('contact_us', ContactUsController::class);

Route::controller(SliderController::class)->group(function () {
  Route::put('sliders/{id}/active','activeToggle');
  Route::delete('sliders/{id}/restore','restore');
});
Route::resource('sliders', SliderController::class);


Route::controller(ServiceController::class)->group(function () {
  Route::put('services/{id}/active','activeToggle');
  Route::delete('services/{id}/restore','restore');
});
Route::resource('services', ServiceController::class);

