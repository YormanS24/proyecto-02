<?php
use Modules\Todos\Http\Controllers\TodosController;
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

Route::prefix('todos')->group(function() {
    Route::get('/', [TodosController::class,'index'])->name('indexTodos');
    Route::post('/', [TodosController::class,'store'])->name('storeTodos');
    Route::get('/{id}',[TodosController::class,'show'])->name('showTodos');
    Route::PUT('/{id}',[TodosController::class,'update'])->name('updateTodos');
    Route::delete('/{id}',[TodosController::class,'destroy'])->name('destroyTodos');
});
