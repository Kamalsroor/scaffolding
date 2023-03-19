<?php

use Illuminate\Http\Request;
use Modules\News\Http\Controllers\Api\NewsController;

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

// Route::middleware('auth:api')->get('/news', function (Request $request) {
//     return $request->user();
// });



Route::resource('news', NewsController::class)->only('index','show');
Route::resource('categories', CategoryController::class)->only('index','show');

