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
//遊客才能進入
Route::group(['middleware'=>'guest'],function(){
	Route::get('/', function () {
	    return view('index');
	});
	Route::post('/','UserController@logIn')->name('login');//登入頁面
	Route::get('/signup','UserController@getSignup');//註冊頁面
	Route::post('/signup','UserController@postSignup');//註冊處理頁
});



/*
	prefix參數代表網址前面大家會有一樣的/admin/ 
	middleware=>auth = 會員才能進入
*/
Route::group(['prefix'=>'admin'], function(){
	Route::group(['middleware'=>'auth'],function(){
		//Home頁面
		Route::get('/main','PostController@getMain')->name('main');
		Route::get('/main/{id}','PostController@getShow')->name('main.show');
		//會員登出
		Route::get('/logout','UserController@logout')->name('logout');
		//會員資料系統
		Route::get('/member/system', function(){
			return view('member.system');
		})->name('member.system');
		//會員編輯
		Route::get('/member/{id}/edit','UserController@edit')->name('member.edit');
		Route::patch('/member/{id}','UserController@update')->name('member.update');
		//會員資料
		Route::get('/member/{id}','UserController@show')->name('member.show');
		//刪除會員
		Route::get('/member/{id}/delete','UserController@showDelete')->name('member.delete.show');
		Route::delete('/member/{id}','UserController@delete')->name('member.delete');
		Route::get('/member/permission/list', function(){
			return view('member.permission');
		})->name('member.permission');

		//公告系統
		/*
		Route::get('/post/system', function(){
			return view('post.system');
		})->name('post.system');

		Route::get('/post/create','PostController@create')->name('post.create');
		Route::post('/post/create','PostController@store')->name('post.store');
		Route::get('/post/list','PostController@list')->name('post.list');
		Route::get('/post/list/show','PostController@list')->name('post.list.show');
		*/	

	});	 
});

Route::group(['prefix'=>'admin/post'], function(){
	Route::group(['middleware'=>'auth'],function(){

		//公告系統頁面
		Route::get('/system', function(){
			return view('post.system');
		})->name('post.system');
		//新增公告頁面
		Route::get('/create','PostController@create')->name('post.create');
		Route::post('/create','PostController@store')->name('post.store');
		//管理公告頁面
		Route::get('/list','PostController@list')->name('post.list');
		//Route::get('/list/show','PostController@list')->name('post.list.show');
		//刪除公告頁面
		Route::delete('/list/{id}/delete','PostController@delete')->name('post.list.delete');
		//編輯更新公告頁面
		Route::get('/{id}/edit','PostController@edit')->name('post.edit');
		Route::patch('/{id}','PostController@update')->name('post.update');
	});	 
});

Route::group(['prefix'=>'admin/system'], function(){
	Route::group(['middleware'=>'admin'],function(){

		//管理會員資料系統
		Route::get('/','UserController@adminSystem')->name('admin.system');
		Route::delete('/{id}/delete','UserController@adminDelete')->name('admin.delete');
		
	});	 
});    