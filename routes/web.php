<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('wx', array('as'=>'wx','uses'=>'WechatController@index'));

#打卡
Route::any('daka', array('as'=>'daka','uses'=>'WechatController@daka'));


#菜单控制器
Route::get('menu',array('as'=>'menu','uses'=>'WechatController@setmenu'));
