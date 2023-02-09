<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');



Route::group('admin', function (){

    Route::post('login', 'AdminController/login');
    Route::post('register', 'AdminController/register');
    Route::group(function (){
        Route::post('logout', 'AdminController/logout');
        Route::post('refresh', 'AdminController/refresh');
        Route::get('get-user-info', 'AdminController/getUserInfo');
        Route::get('get-menu', 'AdminController/getMenu');

    });
});
