<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProductCatalogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SmsController;

Route::get('/sms', [SmsController::class, 'showForm'])->name('sms.form');
Route::post('/sms', [SmsController::class, 'sendSms'])->name('sms.send');

Route::resource('comments', CommentController::class);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/products-catalog', [ProductCatalogController::class, 'index']);

Route::get('/upload', [FileUploadController::class, 'showUploadForm']);
Route::post('/upload', [FileUploadController::class, 'handleFileUpload'])->name('file.upload');

Route::get('/tweets/{hashtag}', [TwitterController::class, 'fetchTweets']);

Route::get('/payment', function () {
    return view('payment');
});
