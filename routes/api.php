<?php

use App\Http\Controllers\api\PushNotificationsController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Http\Resources\AdminResource;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:admin')->get('/admin', function () {
    return auth('admin')->user();
});


Route::group(['as' => 'dashboard.', 'middleware' => 'guest:sanctum'], function () {
    Route::post('/login', [LoginController::class , 'login']);
});
// Route::group(['as' => 'dashboard.', 'middleware' => 'guest:admin'], function () {
//     Route::post('/admin/login', [LoginController::class , 'login']);
// });
Route::group(['as' => 'dashboard.', 'middleware' => 'auth:sanctum'], function () {
    Route::post('/fcm-token', [PushNotificationsController::class, 'updateToken'])->name('fcmToken');
});


