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

Route::post('login', [\App\Http\Controllers\APIController::class, 'login']);
Route::post('register', [\App\Http\Controllers\APIController::class, 'register']);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('refresh', [\App\Http\Controllers\APIController::class, 'refresh']);
    Route::get('logout', [\App\Http\Controllers\APIController::class, 'logout']);
    Route::apiResource('users', \App\Http\Controllers\UserController::class);
    Route::apiResource('posts',\App\Http\Controllers\PostController::class);
    Route::apiResource('orgnaizations',\App\Http\Controllers\OrgnaizationController::class)->middleware(\App\Http\Middleware\CheckAdmin::class);
});

