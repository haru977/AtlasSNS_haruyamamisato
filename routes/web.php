<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

// ログアウト機能
Route::get('/logout','Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'],function(){

Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/profile/{id}/update','UsersController@update');// プロフィール編集機能(ID取得)
Route::post('/profile/update','UsersController@update');// プロフィール編集情報をDBに登録

Route::post('/posts','PostsController@store');// 投稿データ送信
Route::get('/posts','PostsController@index');//投稿データ表示

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

});

