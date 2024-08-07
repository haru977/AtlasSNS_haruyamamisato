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
// auth認証の一括設定
Route::group(['middleware' => 'auth'],function(){

// トップページ
Route::get('/top','PostsController@index');

// プロフィール編集機能
Route::get('/profile','UsersController@profile');
Route::get('/profile/{id}/edit', 'UsersController@edit')->name('profile.edit');// プロフィール編集フォームの表示
Route::post('/profile/update', 'UsersController@update')->name('profile.update');// プロフィール編集情報をDBに更新

// 投稿機能
Route::post('/posts','PostsController@store');// 投稿データ送信
Route::get('/posts','PostsController@index')->name("posts,index");//投稿データ表示

Route::post('/posts/{id}/update','PostsController@update')->name('posts.update');// 投稿の編集
Route::get('/posts/{id}/delete','PostsController@delete');// 投稿の削除

// 検索機能
Route::get('/search','UsersController@search');// 検索機能

// フォローリスト
Route::get('/follow-list','PostsController@index');
Route::get('/follow-list','PostsController@showfollow');

// フォロワーリスト
Route::get('/follower-list','PostsController@index');
Route::get('/follower-list','PostsController@showfollower');

// フォロー機能
Route::post('/users/{user}/follow','FollowsController@follows')->name('users.follow');// フォロー機能
Route::post('/users/{user}/unfollow','FollowsController@unfollow')->name('users.unfollow');// フォロー解除

Route::get('/users/{id}/otherprofile','UsersController@showProfile')->name('show.profile');// 押したアイコンのユーザー情報を取得
Route::get('/users/{id}/otherprofile','UsersController@otherProfile')->name('other.profile');// 押したアイコンのユーザープロフィールを表示
});