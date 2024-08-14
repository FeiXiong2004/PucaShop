<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\authAccountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
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
// Auth
    Route::get('/account', [authAccountController::class, 'index'])->name('account');
    Route::post('/handleRegister', [authAccountController::class, 'handleRegister'])->name('handleRegister');
    Route::post('/handleLogin', [authAccountController::class, 'handleLogin'])->name('handleLogin');
    Route::group(['middleware' => ['auth', 'checkActive']], function () {
        Route::get('/showAccount/{id}', [authAccountController::class, 'showAccount'])->name('showAccount');
        Route::put('/handleUpdateAccount/{id}', [authAccountController::class, 'handleUpdateAccount'])->name('handleUpdateAccount');
        Route::get('/showPassword/{id}', [authAccountController::class, 'showPassword'])->name('showPassword');
        Route::put('/handleUpdatePassword/{id}', [authAccountController::class, 'handleUpdatePassword'])->name('handleUpdatePassword');
        Route::get('/logout', [authAccountController::class, 'logout'])->name('logout');
    });

//  Route::get('/account', [authAccountController::class,'index'])->name('account');
//  Route::post('/handleRegister', [authAccountController::class,'handleRegister'])->name('handleRegister');
//  Route::post('/handleLogin', [authAccountController::class,'handleLogin'])->name('handleLogin');
//  Route::get('/showAccount/{id}', [authAccountController::class,'showAccount'])->name('showAccount');
//  Route::put('/handleUpdateAccount/{id}', [authAccountController::class,'handleUpdateAccount'])->name('handleUpdateAccount');
//  Route::get('/showPassword/{id}', [authAccountController::class,'showPassword'])->name('showPassword');
//  Route::put('/handleUpdatePassword/{id}', [authAccountController::class,'handleUpdatePassword'])->name('handleUpdatePassword');
//  Route::get('/logout', [authAccountController::class,'logout'])->name('logout');

// Clients

//Home
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
})->name('home');
//Shop
Route::get('/shop/{category_id?}', function ($category_id = null) {
    return view('shop', compact('category_id'));
})->name('shop');
//Product Detail
Route::get('/productDetail/{id}', [HomeController::class, 'productDetail'])->name('productDetail');
//Blog
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
//Blog Detail
Route::get('/blog/{id}', [HomeController::class, 'blogDetail'])->name('blogDetail');
//Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//Comments
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::middleware(['auth'])->group(function () {
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

//Contact 
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');