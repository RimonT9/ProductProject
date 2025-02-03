<?php

use App\Http\Controllers\Product\CreateController;
use App\Http\Controllers\Product\DeleteController;
use App\Http\Controllers\Product\EditController;
use App\Http\Controllers\Product\IndexController;
use App\Http\Controllers\Product\ShowController;
use App\Http\Controllers\Product\StoreController;
use App\Http\Controllers\Product\UpdateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::GROUP(['namespace' => 'App/Http/Controllers/Product', 'prefix' => 'product', 'middleware' => ['auth']], function() {
    Route::GET('/', [IndexController::class, '__invoke'])->name('product.index');
    Route::GET('/create', [CreateController::class, '__invoke'])->name('product.create');
    Route::POST('/', [StoreController::class, '__invoke'])->name('product.store');
    Route::GET('/{id}', [ShowController::class, '__invoke'])->name('product.show');
    Route::GET('/{id}/edit', [EditController::class, '__invoke'])->name('product.edit');
    Route::PATCH('/{id}', [UpdateController::class, '__invoke'])->name('product.update');
    Route::DELETE('/{id}', [DeleteController::class, '__invoke'])->name('product.delete');
});
