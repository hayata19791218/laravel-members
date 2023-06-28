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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

//無効なURLはトップページにリダイレクト
Route::fallback(function () {
	return redirect('/home');
});

//ログイン後
Route::middleware(['verified'])->group(function(){
    //投稿一覧の表示
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //リソースコントローラー
    Route::resource('post','PostController');

    //投稿に対するコメント
    Route::post('/post/comment/store','CommentController@store')->name('comment.store');

    //自分の投稿
    Route::get('/mypost','HomeController@mypost')->name('home.mypost');

    //自分のコメントがある投稿
    Route::get('/mycomment','HomeController@mycomment')->name('home.mycomment');

    //管理者画面
    Route::middleware(['can:admin'])->group(function(){
        //ユーザー一覧
        Route::get('/profile/index','ProfileController@index')->name('profile.index');

        //ユーザーの削除
        Route::delete('/profile/delete/{user}','ProfileController@delete')->name('profile.delete');

        //管理者・ユーザーの権限付与
        Route::put('/roles/{user}/attach','RoleController@attach')->name('role.attach');
        Route::put('/roles/{user}/detach','RoleController@detach')->name('role.detach');
    });

    //プロフィールの編集
    Route::get('/profile/{user}/edit','ProfileController@edit')->name('profile.edit');
    Route::put('/profile/{user}','ProfileController@update')->name('profile.update');
});

//お問合せフォーム
Route::get('/contact/create','ContactController@create')->name('contact.create');
Route::post('/contact/store','ContactController@store')->name('contact.store');

