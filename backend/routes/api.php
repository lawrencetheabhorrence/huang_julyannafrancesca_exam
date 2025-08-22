<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('product')->group(function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::put('/{id}', [ProductController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->middleware('auth:sanctum');
});

Route::prefix('order')->group(function(){
    Route::get('/', [ProductOrderController::class, 'index']);
    Route::get('/customer/{customer_id}', [ProductOrderController::class, 'listFromCustomer']);
    Route::post('/', [ProductOrderController::class, 'store']);
    Route::get('/{id}', [ProductOrderController::class, 'show']);
    Route::put('/{id}', [ProductOrderController::class, 'update']);
    Route::delete('/{id}', [ProductOrderController::class, 'destroy']);
});

Route::post('/token/obtain', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
