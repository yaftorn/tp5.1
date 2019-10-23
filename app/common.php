<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function code_array(){
    $array = [
        '0'  =>   '参数错误',
        '1'  =>   '验证失败',
        '2'  =>   '验证码输入错误',
        '3'  =>   '账号不存在',
        '4'  =>   '密码错误',
        '5'  =>   '登录成功',
        '6'  =>   '登录失败',
        '7'  =>   '退出成功',
        '8'  =>   '退出失败',
        '9'  =>   '操作成功',
        '10' =>   '操作失败',
        '11' =>   '两次密码不一致,请重新输入',
        '12' =>   '初始密码输入错误,请重新输入',
        '13' =>   '更新成功',
        '14' =>   '更新失败',
        '15' =>   '删除成功',
        '16' =>   '删除失败',
        '17' =>   '发货成功',
        '18' =>   '发货失败',
        '19' =>   '确认成功',
        '20' =>   '确认失败',

        '198'  =>   '检测登录失败',
        '199'  =>   'session_id不能为空',
        '200'  =>   '获取成功',
        '201'  =>   '参数错误',
        '202'  =>   '登录失败',
        '203'  =>   '注册失败',

        //微信小程序请求登录errcode
        '-1'     =>   '系统繁忙，此时请开发者稍候再试',
        '40029'  =>   'code 无效',
        '45011'  =>   '频率限制，每个用户每分钟100次',

    ];
    return $array;
}

/**
 * 后台返回
 * @param $code 状态码
 * @param string $url 跳转url
 * @param string $msg
 * @return mixed
 */
function adminMsg($code,$url='',$msg=''){
    $arr = code_array();
    $data['code'] = $code;
    if (!empty($url)){
        $data['url'] = $url;
    }
    if (!empty($msg)){
        $data['msg'] = $msg;
    }else{
        $data['msg'] = $arr[$code];
    }
    return $data;
}
/*
 * 微信接口返回
 */
function wxApi($code,$data='',$msg=''){
    $arr = code_array();
    $res['code'] = $code;
    if ($msg == ''){
        $res['msg'] = $arr[$code];
    }else{
        $res['msg'] = $msg;
    }
    if ($data != ''){
        $res['data'] = $data;
    }

    return json($res);

}
/*
 * 后台数据接口返回
 */
function api($data=[],$count=0,$code=0){
    return $data = [
        'code'  => $code,
        'data'  => $data,
        'count' => $count
    ];

}
/*
 * 递归无限极导航
 */
function tree($list,$pid=0,$level=0){
    $arr = [];
    foreach ($list as $k=>$v) {
        if ($v['parent_id'] == $pid){
            $v['level'] = $level;
            $v['id'] = $v['limit_id'];
            $v['name'] = $v['limit_name'];
           $v['children'] = tree($list,$v['limit_id'],$level+1);
           $arr[] = $v;
        }
    }
    return $arr;
}
/*
 * 文章分类处理
 */
function Category($list,$pid=0){
    $arr = [];
    foreach ($list as $k=>$v) {
        if ($v['parent_id'] == $pid){
            $v['id'] = $v['category_id'];
            $v['name'] = $v['category_title'];
            $v['children'] = Category($list,$v['category_id']);
            $arr[] = $v;
        }
    }
    return $arr;
}
/*
 * 删除文件
 */
function deldir($dir)
{
    $dh = opendir($dir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $dir . "/" . $file;
            if (!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
        }
    }
}
/**
 * 获取随机字符串
 * $length 随机字符串长度
 * $str 随机字符串
 * $lower false 小写  true 大写
 */
function randStr($length=10,$str="",$lower=false){
    if ($str !== '') {
        $str = "abcdefghijklmnopqrstuvwxyz1234567890";
    }
    $result = '';
    for ( $i = 0; $i < $length; $i++ )  {
        $result .= substr($str, mt_rand(0, strlen($str)-1), 1);
    }
    if($lower){
        $result = strtoupper($result);
    }
    return $result;

}
/**
 * 无权访问页面
 */
function no_access($url,$time=3,$message="很抱歉，无法访问改页面,请联系管理员"){

    echo "
        <!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>无权访问</title>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta http-equiv=\"Access-Control-Allow-Origin\" content=\"*\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
    <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">
    <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
    <meta name=\"format-detection\" content=\"telephone=no\">
    <style>
        .error .clip .shadow {height:180px;}
        .error .clip:nth-of-type(2) .shadow {width:130px;}
        .error .clip:nth-of-type(1) .shadow,.error .clip:nth-of-type(3) .shadow {width:250px;}
        .error .digit {width:150px;height:150px;line-height:150px;font-size:120px;font-weight:bold;}
        .error h2 {font-size:32px;}
        .error .msg {top:-190px;left:30%;width:80px;height:80px;line-height:80px;font-size:32px;}
        .error span.triangle {top:70%;right:0%;border-left:20px solid #535353;border-top:15px solid transparent;border-bottom:15px solid transparent;}
        .error .container-error-404 {top: 50%;margin-top: 250px;position:relative;height:250px;padding-top:40px;}
        .error .container-error-404 .clip {display:inline-block;transform:skew(-45deg);}
        .error .clip .shadow {overflow:hidden;}
        .error .clip:nth-of-type(2) .shadow {overflow:hidden;position:relative;box-shadow:inset 20px 0px 20px -15px rgba(150,150,150,0.8),20px 0px 20px -15px rgba(150,150,150,0.8);}
        .error .clip:nth-of-type(3) .shadow:after,.error .clip:nth-of-type(1) .shadow:after {content:\"\";position:absolute;right:-8px;bottom:0px;z-index:9999;height:100%;width:10px;background:linear-gradient(90deg,transparent,rgba(173,173,173,0.8),transparent);border-radius:50%;}
        .error .clip:nth-of-type(3) .shadow:after {left:-8px;}
        .error .digit {position:relative;top:8%;color:white;background:#1aa094;border-radius:50%;display:inline-block;transform:skew(45deg);}
        .error .clip:nth-of-type(2) .digit {left:-10%;}
        .error .clip:nth-of-type(1) .digit {right:-20%;}
        .error .clip:nth-of-type(3) .digit {left:-20%;}
        .error h2 {font-size:24px;color:#A2A2A2;font-weight:bold;padding-bottom:20px;}
        .error .tohome {font-size:16px;color:#07B3F9;}
        .error .msg {position:relative;z-index:9999;display:block;background:#535353;color:#A2A2A2;border-radius:50%;font-style:italic;}
        .error .triangle {position:absolute;z-index:999;transform:rotate(45deg);content:\"\";width:0;height:0;}
        @media(max-width:767px) {.error .clip .shadow {height:100px;}
            .error .clip:nth-of-type(2) .shadow {width:80px;}
            .error .clip:nth-of-type(1) .shadow,.error .clip:nth-of-type(3) .shadow {width:100px;}
            .error .digit {width:80px;height:80px;line-height:80px;font-size:52px;}
            .error h2 {font-size:18px;}
            .error .msg {top:-110px;left:15%;width:40px;height:40px;line-height:40px;font-size:18px;}
            .error span.triangle {top:70%;right:-3%;border-left:10px solid #535353;border-top:8px solid transparent;border-bottom:8px solid transparent;}
            .error .container-error-404 {height:150px;}
        }
    </style>
</head>
<body>
<div class=\"error\">
    <div class=\"container-floud\">
        <div style=\"text-align: center\">
            <div class=\"container-error-404\">
                <div class=\"clip\">
                    <div class=\"shadow\">
                        <span class=\"digit thirdDigit\"></span>
                    </div>
                </div>
                <div class=\"clip\">
                    <div class=\"shadow\">
                        <span class=\"digit secondDigit\"></span>
                    </div>
                </div>
                <div class=\"clip\">
                    <div class=\"shadow\">
                        <span class=\"digit firstDigit\"></span>
                    </div>
                </div>
                <div class=\"msg\">OH!
                    <span class=\"triangle\"></span>
                </div>
            </div>
            <h2 class=\"h1\">{$message}</h2>
            <h2 class=\"h1\">
            页面自动 <a style='color:#1aa094;' id=\"href\" href=\"{$url}\">跳转</a> 等待时间： <b id=\"wait\">{$time}</b>
            </h2>
        </div>
    </div>
</div>
<script>
    function randomNum() {
        return Math.floor(Math.random() * 9) + 1;
    }

    var loop1, loop2, loop3, time = 30, i = 0, number;
    loop3 = setInterval(function () {
        if (i > 40) {
            clearInterval(loop3);
            document.querySelector('.thirdDigit').textContent = 4;
        } else {
            document.querySelector('.thirdDigit').textContent = randomNum();
            i++;
        }
    }, time);
    loop2 = setInterval(function () {
        if (i > 80) {
            clearInterval(loop2);
            document.querySelector('.secondDigit').textContent = 0;
        } else {
            document.querySelector('.secondDigit').textContent = randomNum();
            i++;
        }
    }, time);
    loop1 = setInterval(function () {
        if (i > 100) {
            clearInterval(loop1);
            document.querySelector('.firstDigit').textContent = 3;
        } else {
            document.querySelector('.firstDigit').textContent = randomNum();
            i++;
        }
    }, time);
    (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
</script>
</body>
</html>
    ";exit;
}