<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', "App\Http\Controllers\PagesController@home");
Route::get('/about', "App\Http\Controllers\PagesController@about")->middleware('pageNotAllowed');

Route::resource('author/{authid}/pictures', "App\Http\Controllers\PictureController");
Route::resource('authors', "App\Http\Controllers\AuthorController");

Route::get('pictures/author/{id}', "App\Http\Controllers\PictureController@index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', "App\Http\Controllers\PagesController@admin")->middleware('auth');