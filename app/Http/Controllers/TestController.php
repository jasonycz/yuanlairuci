<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Foundation\Application;

class TestController extends Controller
{
    public function show(){
    	echo '<img src="http://mmbiz.qpic.cn/mmbiz_png/libKqSu9CTibP6OuNhiausrbe4jGibA59GljCscGFBcDU8Hp9Zd1FhMnoMCXmTaCDbWtvtPOXfj1VNBibFOeHibIoiczA/0?wx_fmt=png">';
    }
    public function index(Request $request){
    	dd($request->all());
    }
}
