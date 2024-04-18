<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\n_PostController;
use App\Http\Controllers\TimLinController;//要記的cache
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

Route::get('/timindex',[App\Http\Controllers\TimLinController::class,'timindex'])->name('timindex')->middleware('auth');//命名

Route::post('timindex/timcreate',[TimLinController::class,'timcreate'])->name('timcreate');

Route::post('timindex/timdelete/{id}',[TimLinController::class,'timdelete'])->name('timdelete');

Route::post('timindex/timchange/{id}',[TimLinController::class,'timchange'])->name("timchange");

Route::post('timindex/timlastpage',[TimLinController::class,"timlastpage"])->name('timlastpage');// get取得資源 post修改資源 put/patch用來修改資料 delete用來刪除資料 any都處理 match只處理部分的route(array)