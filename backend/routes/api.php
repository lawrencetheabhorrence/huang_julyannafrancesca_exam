<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('product')->group(function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::prefix('order')->group(function(){
    Route::get('/', [ProductOrderController::class, 'index']);
    Route::get('/customer/{customer_id}', [ProductOrderController::class, 'listFromCustomer']);
    Route::post('/', [ProductOrderController::class, 'store']);
    Route::get('/{id}', [ProductOrderController::class, 'show']);
    Route::put('/{id}', [ProductOrderController::class, 'update']);
    Route::delete('/{id}', [ProductOrderController::class, 'destroy']);
});
