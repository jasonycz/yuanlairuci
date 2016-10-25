<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Foundation\Application;

class OauthController extends Controller
{
    public $oauth;

    public function __construct(Application $app){
    	$this->oauth = $app->oauth;
    } 

    public function callback(){
    	// 获取 OAuth 授权结果用户信息
		$user = $this->oauth->user();
		$_SESSION['wechat_user'] = $user->toArray();
		$targetUrl = empty($_SESSION['target_url']) ? '/' : $_SESSION['target_url'];
		header('location:'. $targetUrl); // 跳转到 user/profile
    }
}

