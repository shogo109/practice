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

// コメントアウトする
// Route::get('/home', 'HomeController@index')->name('home');

// このコードを追加する
Route::get('/home', 'App\Http\Controllers\PostsController@index');

//ユーザ編集画面
Route::get('/users/edit', 'App\Http\Controllers\UsersController@edit');
//ユーザ更新画面
Route::post('/users/update', 'App\Http\Controllers\UsersController@update');

// ユーザ詳細画面
Route::get('/users/{user_id}', 'App\Http\Controllers\UsersController@show');

// 投稿新規画面
Route::get('/posts/new', 'App\Http\Controllers\PostsController@new')->name('new');

// 投稿新規処理
Route::post('/posts','App\Http\Controllers\PostsController@store');

//投稿削除処理
Route::get('/postsdelete/{post_id}', 'App\Http\Controllers\PostsController@destroy');

//いいね処理
Route::get('/posts/{post_id}/likes', 'App\Http\Controllers\LikesController@store');

//いいね取消処理
Route::get('/likes/{like_id}', 'App\Http\Controllers\LikesController@destroy');

//コメント投稿処理
Route::post('/posts/{comment_id}/comments','App\Http\Controllers\CommentsController@store');

//コメント取消処理
Route::get('/comments/{comment_id}','App\Http\Controllers\CommentsController@destroy');

// 検索画面
Route::get('/posts/search', 'App\Http\Controllers\PostsController@search')->name('search');

// 検索処理
Route::post('/posts/filter','App\Http\Controllers\PostsController@store2');
