<?php
use Illuminate\Http\Request;

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
//ひとこと掲示板
Route::get('/', function () {
    return view('board');
    
});

//ログイン画面
Route::get('/login', function () {
    return view('login');
    
});

//管理者画面
Route::get('/admin', function () {
    return view('admin');
    
});

    
//ひとこと掲示板にアクセスしたときのルート
Route::get('/', 'BoardController@index');

//管理者画面にアクセスしたときのルート
Route::get('/admin', 'BoardController@admin');

//投稿ボタン押したときのルート
Route::post('/', 'BoardController@store');

//編集・削除ボタン押したときのルート
Route::get('/admin/edit/{id}/{flag}', 'BoardController@show');

//更新ボタン押したときのルート
Route::post('/admin/edit/{id}/{flag}/1', 'BoardController@upd');

//削除ボタン押したときのルート
Route::post('/admin/edit/{id}/{flag}/2', 'BoardController@destroy');

//loginボタン押したときのルート
Route::post('/login', 'BoardController@login');

Route::post('/logout', 'BoardController@logout');

//CSVダウンロードボタン押したときのルート
Route::get('/admin/csv', 'BoardController@export');
