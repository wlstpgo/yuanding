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


    public function setmenu()
    {
        $app = app('wechat.official_account');

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
                        "name" => "搜索",
                        "url"  => "http://www.soso.com/"
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
            ],[
                "name"       => "测试菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "测试项1",
                        "url"  => "http://www.soso.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "测试项2",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "打卡",
                        "key" => "daka"
                    ],
                ],
            ],
        ];
        $app->menu->create($buttons);
    }

    public function daka(){
        $app = app('wechat.official_account');

        $app->server->push(function ($message)
        {
            if($message['MsgType'] == 'event')
            {
                return "欢迎关注 overtrue！";
            }
        });
    }
}
