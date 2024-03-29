<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Entities\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/send-notification',[HomeController::class,'notification'])->name('notification');
// Route::group(['prefix' => 'ap'], function () {
    Route::get('/', function () {
        return view('layouts.app');
    })->where('any', '^(?!api).*$');
    Route::get('{any}', function () {
        return view('layouts.app');
    })->where('any', '^(?!api).*$');
// });

// Route::get('{any}', function () {
//     return view('layouts.front');
// })->where('any', '^(?!api).*$');
Route::group(['prefix' => 'api'], function () {
    Auth::routes();
});

// Route::group(['prefix' => 'api/admin'], function () {
//     Auth::routes();
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
