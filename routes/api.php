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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', [\App\Http\Controllers\UserController::class, 'findAll']);
Route::post('/user', [\App\Http\Controllers\UserController::class, 'create']);
Route::put('/user/{id}', [\App\Http\Controllers\UserController::class, 'update']);
Route::get('user/{id}', [\App\Http\Controllers\UserController::class, 'findById']);
Route::delete('user/{id}', [\App\Http\Controllers\UserController::class, 'delete']);

