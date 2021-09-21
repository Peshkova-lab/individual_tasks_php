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

Route::get('/about', "App\Http\Controllers\PagesController@about");

Route::get('/pictures', "App\Http\Controllers\PictureController@index");

Route::get('/pictures-json', "App\Http\Controllers\PictureController@getList");

Route::get('/pictures/create', "App\Http\Controllers\PictureController@create");

Route::post('/pictures', "App\Http\Controllers\PictureController@store");

Route::get('/pictures/{id}/edit', "App\Http\Controllers\PictureController@edit");
Route::patch('/pictures/{id}', "App\Http\Controllers\PictureController@update");

