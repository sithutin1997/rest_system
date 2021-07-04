<?php

use App\Http\Controllers\DishesController;
use App\Http\Controllers\Order_detailController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Order_detailController::class,'index'])->name('order.form');
Route::post('order_submit',[Order_detailController::class,'submit'])->name('order.submit');
Route::get('/order/{order_detail}/approve',[OrderController::class,'approve'])->name('order.approve');
Route::get('/order/{order_detail}/cancel',[OrderController::class,'cancel'])->name('order.cancel');
Route::get('/order/{order_detail}/done',[OrderController::class,'done'])->name('order.done');


Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
    'confirm' => false,
]);

//Route::get('/home', [App\Http\Controllers\OrderController::class, 'index'])->name('home');
Route::resource('dish',DishesController::class);
Route::get('/order',[OrderController::class,'index']);
