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
	return '<h1>欢迎访问<span style="color:red"> 缘来如此！</span></h1>';
});
Route::any('/wechat', 'WechatController@serve');

Route::group(['middleware' => ['web']], function(){//web 是middleware??
	Route::get('/image','MaterialController@image');
	Route::get('/audio','MaterialController@audio ');
	Route::get('/materialList','MaterialController@materialList');
	Route::get('/materialList/{type}','MaterialController@materialList');
	Route::get('/uploadImage','MaterialController@uploadImage');
	Route::get('/uploadVoice','MaterialController@uploadVoice');
	Route::get('/uploadVideo','MaterialController@uploadVideo');
	Route::get('/uploadThumb','MaterialController@uploadThumb');
	Route::get('/materialDel/{mediaId}','MaterialController@delete');

	// 群发
	Route::get('/material/broadcast','MaterialController@broadcastEveryOne');
	Route::get('/material/broadcast/{openId}','MaterialController@broadcastUser');
	Route::get('/material/broadcast/group/{groupId}','MaterialController@broadcastGroup');
	Route::get('/material/broadcast/preview/{openId}','MaterialController@broadcastPreView');

	Route::get('/test','TestController@index');
	Route::get('/message','MaterialController@message');

	// 菜单
	Route::get('/menu/add','MenuController@add');
	Route::get('/menu/all','MenuController@all');
	Route::get('/menu/delete','MenuController@delete');

	// 用户
	Route::get('/userList','UserController@userList');
	// 网页授权
	Route::get('/user/profile','UserController@userProfile');

	// 授权回调页
	Route::get('/oauth_callback','OauthController@callback');

	// 分组
	Route::get('/group','UserController@getAllGroup');
	Route::get('/group/create/{name}','UserController@createGroup');
	Route::get('/group/update/{groupId}/{name}','UserController@updateGroup');
	Route::get('/group/delete/{groupId}','UserController@deleteGroup');
	Route::get('/group/moveuser/{openId}/{groupId}','UserController@moveUser');
	// Route::get('/group/moveusers','UserController@moveUsers');




	Route::get('/qrcode/create','QrCodeController@create');
});

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

        dd($user);
        
    });
});
