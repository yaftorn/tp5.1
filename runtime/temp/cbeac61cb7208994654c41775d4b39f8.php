<?php /*a:2:{s:49:"D:\wamp64\www\tp5\app\admin\view\index\index.html";i:1571814779;s:42:"D:\wamp64\www\tp5\app\admin\view\base.html";i:1571815470;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php echo htmlentities($title); ?></title>
    <link rel="stylesheet" href="/public/static/admin/css/stadmin.min.css">
    <link rel="stylesheet" href="/public/static/admin/js/layui/css/layui.css">
    <script src="/public/static/admin/js/jquery.min.js"></script>
    <script src="/public/static/admin/js/layui/layui.js"></script>
    <script src="/public/static/admin/js/layui/config.js"></script>
    <script src="/public/static/admin/js/public.js"></script>
    <style>

        .layui-icon1 {
            margin: 0 20px 0 30px;
            background-repeat: no-repeat;
            background-position: -154px -160px;
            width: 23px;
            height: 23px;
            display: inline-block;
            vertical-align: middle;
            font-size: 23px;
        }
        .layuimini-form>.layui-form-item>.layui-form-label {
            width: 120px !important;
        }
        .layuimini-form>.layui-form-item>.layui-input-block {
            margin-left: 150px !important;
        }
        .layui-form-item .layui-input-company {width: auto;padding-right: 10px;line-height: 38px;}
        .layui-table-cell{
            text-align:center;
            height: auto;
            white-space: normal;
        }
        .layui-table img{
            max-width:100px
        }
    </style>
</head>
<body>
<div id="app">
    <div class="aside">
        <div class="logo-wrap">
            <h1 style="font-size: 22px;color: #5b7bfc;padding-top: 17px;text-align: center;">后台系统管理</h1>
        </div>
        <ul class="nav">
            <?php foreach($navBaseList as $v): if(empty($v['children'])): ?>
                <li>
                    <a href="<?php echo url($v['controller'].'/'.$v['action']); ?>">
                        <i class="layui-icon1 layui-icon <?php echo htmlentities($v['icon']); ?>"></i><?php echo htmlentities($v['limit_name']); ?></a>
                </li>
            <?php else: ?>
                <li>
                    <a href="javascript:void(0)">
                        <i class="layui-icon1 layui-icon <?php echo htmlentities($v['icon']); ?>"></i><?php echo htmlentities($v['limit_name']); ?>
                        <i class="icon-add icon-active"></i>
                        <i class="icon-substr icon-active"></i>
                    </a>
                    <dl>
                        <?php foreach($v['children'] as $vv): ?>
                        <dd>
                            <a href="<?php echo url($vv['controller'].'/'.$vv['action']); ?>"><?php echo htmlentities($vv['limit_name']); ?></a>
                        </dd>
                        <?php endforeach; ?>
                    </dl>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="main">
        <div class="header clear" id="header">
            <span class="icon-bar" id="icon-bar"></span>
            <div class="menu-wrap">
                <div class="input-wrap">
                    <input class="input" type="text">
                    <span class="search-btn">
                            <i class="icon-search"></i>
                        </span>
                </div>
                <div class="drop-menu">
                    <div class="box">
                        <img src="/public/static/admin/img/user.png" class="user-image" alt="">
                        <span class="text"><?php echo htmlentities(app('session')->get('admin.admin_account')); ?></span>
                        <i class="icon-down"></i>
                    </div>
                    <ul class="menu-list">
                        <li class="js-updatepwd">修改密码</li>
                        <li class="clearCache">清除缓存</li>
                    </ul>
                </div>
                <i class="icon-quit"></i>
            </div>
        </div>
        <script id="updatepwdTpl" type="text/html">
            <div class="pwd-form">
                <div class="pwd-item">
                    <label>旧密码：</label>
                    <div class="pwd-input">
                        <input type="text" name="oldPassword">
                    </div>
                </div>
                <div class="pwd-item">
                    <label>新密码：</label>
                    <div class="pwd-input">
                        <input type="text" name="newPassword">
                    </div>
                </div>
                <div class="pwd-item">
                    <label>新密码：</label>
                    <div class="pwd-input">
                        <input type="text" name="rePassword">
                    </div>
                </div>
            </div>
        </script>



        
<style>
    td:first-child
    {
        background-color:#f7f7f7;
    }
</style>
<div class="login-data">
    <p class="text">最近登录时间：<?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric(app('session')->get('admin.admin_endtime'))? strtotime(app('session')->get('admin.admin_endtime')) : app('session')->get('admin.admin_endtime'))); ?></p>
    <p class="text">登录IP:<?php echo htmlentities(app('session')->get('admin.admin_ip')); ?></p>
</div>
<div class="container" id="container">
    <div class="container-wrap">
        <div class="home-panel">
            <div class="count-data-wrap">
                <div class="data">
                    <i class="layui-icon layui-icon-read" style="font-size: 66px; color:#5FB878;"></i>
                    <div class="text-wrap">
                        <h5 class="num-text">132</h5>
                        <h6 class="text">文章总数</h6>
                    </div>
                </div>
                <div class="data">
                    <i class="layui-icon layui-icon-user" style="font-size: 66px; color:#2F4056;"></i>
                    <div class="text-wrap">
                        <h5 class="num-text">132</h5>
                        <h6 class="text">会员总数</h6>
                    </div>
                </div>
                <div class="data">
                    <i class="layui-icon layui-icon-form" style="font-size: 66px; color: #FFB800;"></i>
                    <div class="text-wrap">
                        <h5 class="num-text">132</h5>
                        <h6 class="text">订单总数</h6>
                    </div>
                </div>
                <div class="data">
                    <i class="layui-icon layui-icon-rmb" style="font-size: 66px; color: #FF5722;"></i>
                    <div class="text-wrap">
                        <h5 class="num-text">132</h5>
                        <h6 class="text">订单总金额</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-flex clear">
            <div class="flex float-right">
                <div class="home-panel">
                    <div class="flex-right">
                        <div class="action-menu">
                            <i></i>
                            <i></i>
                            <i></i>
                        </div>
                    </div>
                    <div class="canvas-title">
                        <h4 class="title">数据增加情况</h4>
                        <div class="flex">
                            <div class="canvas-tab">
                                <span class="item active">日数据</span>
                                <span class="item">月数据</span>
                                <span class="item">年数据</span>
                            </div>
                        </div>
                        <ul class="canvas-label">
                            <li>
                                <i class="icon-label0"></i>转发</li>
                            <li>
                                <i class="icon-label1"></i>名片</li>
                            <li>
                                <i class="icon-label2"></i>公司</li>
                            <li>
                                <i class="icon-label3"></i>产品</li>
                        </ul>
                    </div>
                    <div class="canvas-wrap">
                        <div id="add-echart" style="width:100%;height: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-flex bg-white clear">
            <div class="flex">
                <div class="home-panel container" style="width: 60%;float: left;">
                    <div class="canvas-title">
                        <h4 class="title">留言反馈</h4>
                    </div>
                    <div class="canvas-wrap">
                        <div class="opinion-wrap active">
                            <div class="opinion-box">

                            </div>
                        </div>
                    </div>
                </div>

                </div>
                <div class="home-panel" style="width: 30%;float: left">
                    <div class="canvas-title">
                        <h4 class="title">版本信息</h4>
                    </div>
                    <div class="canvas-wrap">
                        <div class="opinion-wrap active">
                                <table class="layui-table">
                                    <tr>
                                        <td>服务器环境:</td>
                                        <td><?php echo htmlentities($version['apache']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>服务器域名:</td>
                                        <td><?php echo htmlentities($version['url']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>PHP版本:</td>
                                        <td><?php echo htmlentities($version['php']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>服务器操作系统:</td>
                                        <td><?php echo htmlentities($version['os']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>thinkphp版本</td>
                                        <td><?php echo htmlentities($version['tp']); ?></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>
<script>

        $(".icon-quit").click(function () {
            $.ajax({
                url: "<?php echo url('login/loginOut'); ?>",
                success: function (re) {
                    if (re.code == 7) {
                        layer.msg(re.msg, function () {
                            window.location.href = "<?php echo url('login/login'); ?>";
                        })
                    } else {
                        layer.msg(re.msg);
                    }
                }
            })
        })
        $(".js-updatepwd").click(function () {
            layer.open({
                title:"修改密码",
                area: ['555px', '333px'],
                content:$("#updatepwdTpl").html(),
                btn:['确认', '取消'],
                yes:function () {
                    var newPassword = $("input[name=newPassword]").val();
                    var oldPassword = $("input[name=oldPassword]").val();
                    var rePassword = $("input[name=rePassword]").val();
                    $.ajax({
                        url:"<?php echo url('login/updatePassword'); ?>",
                        data:{newPassword:newPassword,oldPassword:oldPassword,rePassword:rePassword},
                        success:function (re) {
                            if (re.code == 9){
                                layer.msg(re.msg,function () {
                                    window.location.href = "<?php echo url('login/login'); ?>"
                                })
                            }else{
                                layer.msg(re.msg);
                            }
                        }
                    })
                }
            })
        })
        $(".clearCache").click(function () {
            $.ajax({
                url:"<?php echo url('index/clearCache'); ?>",
                success:function (re) {
                    if (re.code == 9){
                        layer.msg(re.msg,function () {
                            window.location.reload();
                        });
                    }
                }
            })
        })
        //图片点击看原图
        $("body").on("click",".layui-form-item img",function(e) {
            layer.photos({
                photos: {"data": [{"src": e.target.src}]}
            });
        })

</script>



</body>
</html>