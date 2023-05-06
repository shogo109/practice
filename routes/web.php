<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/','App\Http\Controllers\PostsController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ユーザ編集画面
Route::get('/users/edit', 'App\Http\Controllers\UsersController@edit');
//ユーザ更新画面
Route::post('/users/update', 'App\Http\Controllers\UsersController@update');

// ユーザ詳細画面
Route::get('/users/{user_id}', 'App\Http\Controllers\UsersController@show');
