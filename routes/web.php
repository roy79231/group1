<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\n_PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/n_post',[App\Http\Controllers\n_PostController::class, 'n_index'])->name('n_index')->middleware('auth');
Route::match(['post','get'],'/n_post/create',[App\Http\Controllers\n_PostController::class, 'n_create'])->name('n_create')->middleware('auth');

Route::match(['patch','put'],'/n_post/{post}',[n_PostController::class,'n_update'])->name('n_update');

Route::get('/n_post/{post}/edit',[n_PostController::class,'n_edit'])->name('n_edit');

Route::post('/n_post/store',[n_PostController::class,'n_store'])->name('n_store');

Route::delete('/n_post/{post}',[n_PostController::class,'n_delete'])->name('n_delete');
