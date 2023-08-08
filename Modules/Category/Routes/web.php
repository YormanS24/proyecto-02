<?php

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

use Modules\Category\Http\Controllers\CategoryController;

Route::prefix('category')->group(function() {
//    Route::get('/', 'CategoryController@index');
    Route::get('/',[CategoryController::class,'index'])->name('indexCategory');
    Route::post('/', [CategoryController::class,'store'])->name('storeCategory');
    Route::get('/{id}',[CategoryController::class,'show'])->name('showCategory');
    Route::delete('/{id}',[CategoryController::class,'destroy'])->name('deleteCategory');
    Route::patch('/{id}',[CategoryController::class,'update'])->name('updateCategory');
});
