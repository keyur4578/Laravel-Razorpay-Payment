<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Cache;


Route::get('/', function () {
    return view('welcome');
});
Route::get("/razorpay",[RazorpayController::class,'index']);
Route::post("/razorpay/payment",[RazorpayController::class,'payment'])->name('razorpay.payment');
Route::get("/razorpay/callback",[RazorpayController::class,'callback'])->name('razorpay.callback');
Route::get("/products",[ProductController::class,'index']);

Route::get("/redis-test",function(){
    Cache::put("name","KAron Digital Academy",60);
    return Cache::get('name');
});
