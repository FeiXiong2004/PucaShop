<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\authAccountController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Category;

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
Route::middleware(AdminMiddleware::class)->prefix('admin')->as('admin.')->group(function () {
   // Dashboard
   Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
   //Category
   Route::prefix('category')->as('category.')->group(function () {
      Route::get("/list", [CategoryController::class, "index"]);
      Route::get("/create", [CategoryController::class, "create"])->name('create');
      Route::post("/create", [CategoryController::class, "store"])->name('store');
      Route::get("/edit/{id}", [CategoryController::class, "edit"])->name('edit');
      Route::put("/edit/{id}", [CategoryController::class, "update"])->name('update');
      Route::delete("/destroy/{id}", [CategoryController::class, "destroy"])->name('destroy');
   });
   //Product
   Route::prefix('product')->as('product.')->group(function () {
      Route::get("/list", [ProductController::class, "index"]);
      Route::get("/create", [ProductController::class, "create"])->name('create');
      Route::post("/create", [ProductController::class, "store"])->name('store');
      Route::get("/show/{id}", [ProductController::class, "show"])->name('show');
      Route::get("/edit/{id}", [ProductController::class, "edit"])->name('edit');
      Route::put("/edit/{id}", [ProductController::class, "update"])->name('update');
      Route::delete("/destroy/{id}", [ProductController::class, "destroy"])->name('destroy');
   });
  
   //Post
   Route::prefix('post')->as('post.')->group(function () {
      Route::get("/list", [PostController::class, "index"]);
      Route::get("/create", [PostController::class, "create"])->name('create');
      Route::post("/create", [PostController::class, "store"])->name('store');
      Route::get("/edit/{post}", [PostController::class, "edit"])->name('edit');
      Route::put("/edit/{post}", [PostController::class, "update"])->name('update');
      Route::delete("/destroy/{post}", [PostController::class, "destroy"])->name('destroy');
   });
   //Users
   Route::prefix('user')->as('user.')->group(function () {
      Route::get("/list", [UserController::class, "index"]);
      Route::get("/create", [UserController::class, "create"])->name('create');
      Route::post("/create", [UserController::class, "store"])->name('store');
      Route::get("/show/{id}", [UserController::class, "show"])->name('show');
      Route::get("/edit/{id}", [UserController::class, "edit"])->name('edit');
      Route::put("/edit/{id}", [UserController::class, "update"])->name('update');
      Route::delete("/destroy/{id}", [UserController::class, "destroy"])->name('destroy');
   });
});
