<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Foundation\Application;


class UserController extends Controller
{   

    public $user;
    public $group;
    public $oauth;

    public function __construct(Application $app){
    	$this->user = $app->user;
        $this->group = $app->user_group;
        $this->oauth = $app->oauth;
    } 

    public function userList(){
        $users = $this->user->lists($nextOpenId = null);
        return $users;
    }

    // 获取当个用户信息
    public function getUserInfo($openId){
        $user = $this->user->get($openId);
        dd($user);
    }
   
    // 修改用户备注
    public function remarkUser($openId,$remark){
        $res = $this->user->remark($openId,$remark);
        if($res){
            dd('修改用户备注成功!');

        }
    }

    // 获取用户所属用户组ID
    public function getUserGroup($openId){
        $res = $this->user->group($openId);
        if($res){
            dd($res);
        }else{
            dd('所属用户组ID为空');
        }
    }

    // 用户组
    
    // 获取所有分组
    public function getAllGroup(){
        $groups = $this->group->lists();
        dd($groups);
    }
    // 创建分组
    public function createGroup($name){
        $groups = $this->group->create($name);
        dd($groups);
    }
    // 修改分组信息
    public function updateGroup($groupId, $name){
        if(!is_numeric($groupId) || (!isset($name))){
            dd('输入参数有误!');
        }
        $this->group->update($groupId, $name);
    }
    // 删除分组信息
    public function deleteGroup($groupId){
        if(!is_numeric($groupId)){
            dd('输入参数有误!');
        }
        $this->group->delete($groupId);
    }
    // 移动单个用户到指定分组
    public function moveUser($openId, $groupId){
        if(empty($openId) || (!is_numeric($groupId))){
            dd('输入参数有误!');
        }
        $this->group->moveUser($openId, $groupId);

    }
    // 网页授权
    public function userProfile(){
        // 未登录
        if (empty($_SESSION['wechat_user'])) {
          $_SESSION['target_url'] = 'user/profile';
          // return $this->oauth->redirect();
          // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
          $this->oauth->redirect()->send();
        }

        // 已经登录过
        $user = $_SESSION['wechat_user'];
        dd($user);

    }


    

































}
