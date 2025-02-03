<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Product\Api\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'namespace' => 'App/Http/Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::GROUP(['namespace' => 'App/Http/Controllers/Product/Api', 'prefix' => 'product', 'middleware' => 'jwt.auth'], function() {
    Route::GET('/', [IndexController::class, '__invoke'])->name('product.index');
});