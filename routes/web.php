<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Clients
Route::get('/home',function(){
    return view('home');
})->name('home');
// Route::get('/home', [ProductsController::class,'index'])->name('home');
Route::get('/shop/{category_id?}', function ($category_id = null) {
    return view('shop', compact('category_id'));
})->name('shop');
Route::get('/productDetail/{id}', [HomeController::class,'productDetail'])->name('productDetail');

