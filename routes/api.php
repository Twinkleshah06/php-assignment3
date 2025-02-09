<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HeaderController;
use App\Http\Controllers\PaymentController;
// use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\ItemController;

Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [ItemController::class, 'show']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::post('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// Route::apiResource('products', ProductController::class);

Route::get('/header-value', [HeaderController::class, 'getHeaderValue']);

// Route::get('/header-response', [HeaderController::class, 'getCustomHeader']);

Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent']);

// Route::get('/custom-header', [HeaderController::class, 'handleHeader']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
