<?php

use App\Http\Controllers\Admin\DashBoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\authAccountController;
use App\Http\Controllers\Auth\RegisterController;

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


//Admin routes
Route::prefix('admin')->as('admin.')->group(function (){
  

   // Dashboard
   Route::get('/', [DashBoardController::class,'index'])->name('dashboard');
   //Post
   Route::prefix('post')->as('post.')->group(function (){
    Route::get("/list",[PostController::class,"index"]);
    Route::get("/create",[PostController::class,"create"])->name('create');
    Route::post("/create",[PostController::class,"store"])->name('store');
    Route::get("/edit/{post}",[PostController::class,"edit"])->name('edit');
    Route::put("/edit/{post}",[PostController::class,"update"])->name('update');
    Route::delete("/destroy/{post}",[PostController::class,"destroy"])->name('destroy');
    
   });
});
