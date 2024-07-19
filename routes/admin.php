<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CataloguesController;
use App\Models\Catalogues;

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

Route::prefix('admin')->group(function (){
    Route::resource('catalogues', CataloguesController::class);
});
