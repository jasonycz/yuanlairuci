<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Foundation\Application;

use EasyWeChat\Message\Article;



class MaterialController extends Controller
{   

    // 永久素材
    public $material;
    // 临时素材
    public $temporary;
    public $broadcast;

    public function __construct(Application $app){
    	$this->material = $app->material;
        $this->temporary = $app->material_temporary;
    	$this->broadcast = $app->broadcast; 
    } 

    public function broadcastEveryOne(){
        // $this->broadcast->sendText('大家好,欢迎关注我！');
        // $this->broadcast->sendImage('PfycPRapQqZdCoHdNAuscMpZBrYCgrGDHI80T6ZQtsU');
        // $this->broadcast->sendVoice('PfycPRapQqZdCoHdNAuscMPGp6DeNHAY36ZJtPreyvc');
        $this->broadcast->sendVideo('PfycPRapQqZdCoHdNAuscLl2xNrjM9QfgowLvBX5Mcg','测试视频','This is a test vedio');
    }
    public function broadcastUser($openId=null){
        $messageType = 'video';
        $message = 'PfycPRapQqZdCoHdNAuscLl2xNrjM9QfgowLvBX5Mcg';
        $openId = 'o9iQ7wwEtqahB7hvK5hzyLUWif3I';
        // $this->broadcast->sendText('大家好,欢迎关注我！');
        // $this->broadcast->sendImage('PfycPRapQqZdCoHdNAuscMpZBrYCgrGDHI80T6ZQtsU');
        // $this->broadcast->sendVoice('PfycPRapQqZdCoHdNAuscMPGp6DeNHAY36ZJtPreyvc');
        $this->broadcast->send($messageType, $message, $openId);
    }
    public function broadcastGroup($groupId=null){
        $messageType = 'video';
        $message = 'PfycPRapQqZdCoHdNAuscLl2xNrjM9QfgowLvBX5Mcg';
        $openId = 'o9iQ7wwEtqahB7hvK5hzyLUWif3I';
        // $this->broadcast->sendText('大家好,欢迎关注我！');
        // $this->broadcast->sendImage('PfycPRapQqZdCoHdNAuscMpZBrYCgrGDHI80T6ZQtsU');
        // $this->broadcast->sendVoice('PfycPRapQqZdCoHdNAuscMPGp6DeNHAY36ZJtPreyvc');
        $this->broadcast->send($messageType, $message, $openId);
    }
    public function broadcastPreview($openId=null){
        $messageType = 'video';
        $message = 'PfycPRapQqZdCoHdNAuscLl2xNrjM9QfgowLvBX5Mcg';
        $openId = 'o9iQ7wwEtqahB7hvK5hzyLUWif3I';
        // $this->broadcast->sendText('大家好,欢迎关注我！');
        // $this->broadcast->sendImage('PfycPRapQqZdCoHdNAuscMpZBrYCgrGDHI80T6ZQtsU');
        // $this->broadcast->sendVoice('PfycPRapQqZdCoHdNAuscMPGp6DeNHAY36ZJtPreyvc');
        $this->broadcast->send($messageType, $message, $openId);
    }

    // 获取永久素材列表
    public function materialList($type=null){
        if(empty($type)){
            $type = array(
                'image',
                'voice',
                'video',
                // 'thumb',

            );
        }
    	$offset = '0';
    	$count = '20';
        $material = array();

        if(is_array($type)){
            foreach ($type as $value) {
                $material[] = $this->material->lists($value, $offset, $count);
            }
        }else{
            $material = $this->material->lists($type, $offset, $count);
        }
    	return $material;
    }
    // 删除永久素材列表
    public function delete($mediaId){
        $this->material->delete($mediaId);
        return $mediaId.'删除成功';
    }

    public function message(){
    	// $this->broadcast->send('text','hello world！使用后台群发数据');
    	// $this->broadcast->send('media_id','PfycPRapQqZdCoHdNAuscKCh-TLy42Uacbsfs6q9Kyo');
    }

    // 上传图片
    public function uploadImage(){
        $inputArray = array(
            'images/1.png',
            'images/2.jpg',
        );
        foreach ($inputArray as  $image) {
            $res = $this->material->uploadImage($image);
            // var_dump($res);
        }
        
    }
    // 上传声音
    public function uploadVoice(){
        $inputArray = array(
            'voice/1.mp3',

        );
        foreach ($inputArray as  $voice) {
            $res = $this->material->uploadVoice($voice);
            // var_dump($res);
        }
        
    }
    // 上传视频
    public function uploadVideo(){
        $inputArray = array(
            'video/1.mp4',

        );
        foreach ($inputArray as  $video) {
            $res = $this->material->uploadVideo($video,"测试视频", "这是一个测试视频");
            // var_dump($res);
        }
        
    }
    // 上传缩略图
    public function uploadThumb(){
        $inputArray = array(
            'thumb/thumb1.png',

        );
        foreach ($inputArray as  $thumb) {
            $res = $this->material->uploadThumb($thumb);
            // var_dump($res);
        }
        
    }

    // 上传单篇图文
    public function uploadArticle(){
        $article = new Article([
            'title' => 'xxx',
            'thumb_media_id' => $mediaId,
            
        ]);
        $this->material->uploadArticle($article);
        // 或者多篇图文
        // $material->uploadArticle([$article, $article2, ...]);

    }
    // 获取永久素材
    public function getMaterial($mediaId){
        $resource = $this->material->get($mediaId);
    }
    





















}
