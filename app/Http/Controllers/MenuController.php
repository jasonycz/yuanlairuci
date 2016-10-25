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
		    	"name" => "一级菜单",
		    	"sub_button" => [
			    	[
			    		"type" => "click",
			        	"name" => "常用网址",
			        	"key"  => "V1001_LIKE_WEBSITE"
			        ],
		    		[
		    			"type" => "pic_sysphoto",
		    			"name" => "系统拍照发图",
		    			"key" => "rselfmenu_1_0",
		    			"sub_button" => []
		    		],
		    		[
		    			"type" => "pic_photo_or_album",
		    			"name" => "拍照或者相册发图",
		    			"key" => "rselfmenu_1_1",
		    			"sub_button" => []
		    		],
		    		[
		    			"type" => "pic_weixin",
		    			"name" => "微信相册发图",
		    			"key" => "rselfmenu_1_2",
		    			"sub_button" => []
		    		],
		    		[
		    			"name" => "发送位置", 
			            "type" => "location_select", 
			            "key" => "rselfmenu_2_0"
		    		],

		    	],
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
		                "name" => "上传图片",
		                "url"  => "http://www.xiaoyuanromance.top:8081/jquery_pc/lite.php"
		            ],
		            [
		                "type" => "view",
		                "name" => "获取线上数据",
		                "url"  => "http://www.xiaoyuanromance.top:8081/script/"
		            ],
		            [
		                "type" => "click",
		                "name" => "赞一下我们",
		                "key" => "V1001_GOOD"
		            ],
		            [
		                "type" => "view",
		                "name" => "网页授权",
		                "url" => "http://www.xiaoyuanromance.top/user/profile"
		            ],
		        ],
		    ],
		    [
	            "name" => "扫码", 
	            "sub_button" => [
	                [
	                    "type" => "scancode_waitmsg", 
	                    "name" => "扫码带提示", 
	                    "key" => "rselfmenu_0_0", 
	                    "sub_button" => [ ]
	                ], 
	                [
	                    "type" => "scancode_push", 
	                    "name" => "扫码推事件", 
	                    "key" => "rselfmenu_0_1", 
	                    "sub_button" => [ ]
	                ]
	            ]
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
