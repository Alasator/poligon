<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('register', [\App\Http\Controllers\Api\Auth\RegisterController::class, '__invoke']);
        Route::post('login', [\App\Http\Controllers\Api\Auth\LoginController::class, '__invoke']);
        Route::post('logout', [\App\Http\Controllers\Api\Auth\LogoutController::class,'__invoke'])->middleware('auth:api');
    });
});
