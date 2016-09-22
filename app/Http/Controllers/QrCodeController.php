<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Foundation\Application;

class QrCodeController extends Controller
{
    public $qrcode;

    public function __construct(Application $app){
    	$this->qrcode = $app->qrcode;
    } 
	public function p($str){
	    echo "<pre>";
	    print_r($str);
	    echo "</pre>";
	}
	public function ps($str){
	    p($str);
	    die();
	}
    public function create(){
    
		$result = $this->qrcode->temporary(56, 6 * 24 * 3600);	
		$url = $result->url;
		$ticket = $result->ticket;
		$expireSeconds = $result->expire_seconds;
		$url_tick = $this->qrcode->url($ticket);
		$this->p($ticket);
		$this->p($url);
		$this->p($url_tick);
		echo "<img src=$url_tick  >";

    	return 'qrcode add';
    	
    } 
}
