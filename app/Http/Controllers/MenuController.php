<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Foundation\Application;

class MenuController extends Controller
{
    public $menu;

    public function __construct(Application $app){
    	$this->menu = $app->menu;
    } 

    public function add(){
    	$buttons = [
		    [
		        "type" => "click",
		        "name" => "今日歌曲",
		        "key"  => "V1001_TODAY_MUSIC"
		    ],
		    [
		        "name"       => "菜单",
		        "sub_button" => [
		            [
		                "type" => "view",
		                "name" => "用户登录",
		                "url"  => "http://www.xiaoyuanromance.top/user"
		            ],
		            [
		                "type" => "view",
		                "name" => "视频",
		                "url"  => "http://v.qq.com/"
		            ],
		            [
		                "type" => "click",
		                "name" => "赞一下我们",
		                "key" => "V1001_GOOD"
		            ],
		        ],
		    ],
		];

		$this->menu->add($buttons);
    	

    	return 'menu add';
    	
    } 
    public function all(){
    	return $this->menu->all();

    }
    public function delete(){
    	$this->menu->destroy();
    	return "删除全部菜单成功";

    }
    
}
