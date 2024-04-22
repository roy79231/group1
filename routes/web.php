<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontrollerjames;

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



Route::get('/postindex',[postcontrollerjames::class,'postindex'])->name('postindex');
Route::post('/postindex/create',[postcontrollerjames::class,'create'])->name('create');
Route::get('/postindex/edit/{posts}',[postcontrollerjames::class,'edit'])->name('edit');
Route::match(['get','patch'],'/postindex/update/{id}',[postcontrollerjames::class,'update'])->name('update');
Route::delete('/postindex/{posts}',[postcontrollerjames::class,'delete'])->name('delete');