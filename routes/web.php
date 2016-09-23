<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return 'hello';
});
Route::any('/wechat', 'WechatController@serve');

Route::group(['middleware' => ['web']], function(){//web 是middleware??
	Route::get('/image','MaterialController@image');
	Route::get('/audio','MaterialController@audio ');
	Route::get('/materialList','MaterialController@materialList');
	Route::get('/test','TestController@show');
	Route::get('/message','MaterialController@message');
	Route::get('/menu/add','MenuController@add');
	Route::get('/menu/all','MenuController@all');
	Route::get('/menu/delete','MenuController@delete');


	Route::get('/qrcode/create','QrCodeController@create');
});

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

        dd($user);
        
    });
});
