<?php

use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;
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

Route::get('/test/{x?}', function ($x = null) {
    echo $x;
    // return view('welcome');
});
// todo
Route::get('/todo',[todoController::class,'all'])->name('all');
Route::post('/todo/add',[todoController::class,'add'])->name('add');
Route::get('/todo/edit/{id}',[todoController::class,'edit'])->name('edit');
Route::get('/todo/delete/{id}',[todoController::class,'delete'])->name('delete');
Route::post('/todo/update/{id}',[todoController::class,'update'])->name('update');
Route::get('/todo/doing/{id}',[todoController::class,'doingstatus'])->name('doing');
Route::get('/todo/done/{id}',[todoController::class,'donestatus'])->name('done');
Route::get('/todo/delete/{id}',[todoController::class,'deletedone'])->name('delete');

//category
Route::get('/categories', [categoryController::class, "all"])->name("all");
Route::get('/categories/show/{id}', [categoryController::class, "show"]);
//insert
Route::get('/categories/create', [categoryController::class, "create"]);
Route::post('/categories', [categoryController::class, 'store']);
//edit
Route::get('/categories/edit/{id}', [categoryController::class, "edit"]);
Route::put('/categories/{id}', [categoryController::class, "update"]);
//delete
Route::delete('/categories/{id}', [categoryController::class, "delete"]);
