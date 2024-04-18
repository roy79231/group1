<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/timindex',[App\Http\Controllers\TimLinController::class,'timindex'])->name('timindex')->middleware('auth');//命名

Route::post('timindex/timcreate',[TimLinController::class,'timcreate'])->name('timcreate');

Route::post('timindex/timdelete/{id}',[TimLinController::class,'timdelete'])->name('timdelete');

Route::post('timindex/timchange/{id}',[TimLinController::class,'timchange'])->name("timchange");

Route::post('timindex/timlastpage',[TimLinController::class,"timlastpage"])->name('timlastpage');// get取得資源 post修改資源 put/patch用來修改資料 delete用來刪除資料 any都處理 match只處理部分的route(array)