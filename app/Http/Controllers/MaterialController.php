<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Foundation\Application;

class MaterialController extends Controller
{
    public $material;
    public $broadcast;

    public function __construct(Application $app){
    	$this->material = $app->material;
    	$this->broadcast = $app->broadcast; 
    } 

    public function image(){
    	$image = $this->material->uploadImage(public_path().'/images/test.png');
    	return $image;
    	
    } 
    public function materialList(){
    	$type = 'image';
    	$offset = '0';
    	$count = '2';
    	$images = $this->material->lists($type, $offset, $count);
    	return $images;
    	
    }

    public function message(){
    	// $this->broadcast->send('text','hello world！使用后台群发数据');
    	// $this->broadcast->send('media_id','PfycPRapQqZdCoHdNAuscKCh-TLy42Uacbsfs6q9Kyo');
    }


}
