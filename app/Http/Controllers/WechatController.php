<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Foundation\Application;

use Log;

class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        $userApi = $wechat->user;
         // dd($userApi->lists($nextOpenId = null));
        $wechat->server->setMessageHandler(function($message) use ($userApi,$wechat){
            switch ($message->MsgType) {
		        case 'event':
		            if($message->Event == 'subscribe'){
		            	return '欢迎加入缘来如此';
		            }
		            if($message->Event == 'CLICK'){
		            	if($message->EventKey == 'V1001_TODAY_MUSIC'){
		            		return 'http://www.xiaoyuanromance.top';
		            	}
		            }
		            
		            break;
		        case 'text':
		            # 文字消息...
		 
		            return 'hello world '.$userApi->get($message->FromUserName)->nickname; //'o9iQ7wwEtqahB7hvK5hzyLUWif3I'
		            break;
		        case 'image':
		            # 图片消息...
		            $image = new Image(['media_id'=>'PfycPRapQqZdCoHdNAuscKCh-TLy42Uacbsfs6q9Kyo']);
		            $wechat->staff->message($image)->to($message->FromUserName)->send();

		            return '图片回复';
		            break;
		        case 'voice':
		            # 语音消息...
		            break;
		        case 'video':
		            # 视频消息...
		            break;
		        case 'location':
		            # 坐标消息...
		            break;
		        case 'link':
		            # 链接消息...
		            break;
		        // ... 其它消息
		        default:
		            # code...
		            break;
			}
        });

        Log::info('return response.');

        return $wechat->server->serve();
    }
}
