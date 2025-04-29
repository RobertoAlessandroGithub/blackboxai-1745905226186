<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;


Route::get('/', [OrderController::class, 'showMenu'])->name('menu');
Route::post('/order', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/order-success/{order}', [OrderController::class, 'orderSuccess'])->name('order.success');
