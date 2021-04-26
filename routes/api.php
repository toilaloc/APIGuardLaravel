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

Route::apiResource('v1/posts',\App\Http\Controllers\PostController::class)->middleware('jwt.auth');
Route::post('login', [\App\Http\Controllers\APIController::class, 'login']);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('logout', [\App\Http\Controllers\APIController::class, 'logout']);
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index']);
});

