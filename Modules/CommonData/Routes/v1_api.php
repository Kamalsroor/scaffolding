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


Route::controller(ContactUsController::class)->group(function () {
    Route::post('contact_us','store');
});

Route::controller(SubscribeController::class)->group(function () {
  Route::post('subscribe','store');
});
Route::resource('sponsers', SponserController::class)->only('index');
Route::resource('sliders', SliderController::class)->only('index');
Route::resource('services', ServiceController::class)->only('index');

