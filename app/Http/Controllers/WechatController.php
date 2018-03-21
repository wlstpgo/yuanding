<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;

class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function index()
    {
        #Log::info('访问微信了.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        #$app->server->push(function($message){
            #return "欢迎关注 overtrue！";
        #});
	
	#此处些业务
	$app->server->push(function ($message) {
    		switch ($message['MsgType']) {
        		case 'event':
            			return '收到事件消息';
            			break;
        		case 'text':
            			return '收到文字消息';
            			break;
        		case 'image':
            			return '收到图片消息';
            			break;
        	case 'voice':
            	return '收到语音消息';
            	break;
        	case 'video':
            	return '收到视频消息';
            	break;
        	case 'location':
            	return '收到坐标消息';
            	break;
        	case 'link':
            	return '收到链接消息';
            	break;
        	// ... 其它消息
        	default:
            	return '收到其它消息';
            	break;
    	}

    	// ...
	});
	

        return $app->server->serve();
    }
}
