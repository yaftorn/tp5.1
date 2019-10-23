<?php /*a:2:{s:56:"D:\wamp64\www\tp5\app\admin\view\member\member_info.html";i:1571813719;s:42:"D:\wamp64\www\tp5\app\admin\view\base.html";i:1571815470;}*/ ?>
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



        
<div class="container" id="container">
    <div class="container-wrap">
        <div class="home-panel">
            <div class="info-container clear">
                <div class="vip-info">
                    <div class="info-item">
                        <div class="title-wrap">
                            <h4 class="title">基本信息</h4>
                        </div>
                        <div class="info-wrap">
                            <div class="info-text>" style="margin-bottom: 20px;">
                                <div class="flex">
                                    <div class="text-flex">
                                        <img style="width:100px;height: 100px;" src="img/img1.png" alt="">
                                        <p class="text"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-text">
                                <div class="flex">
                                    <div class="text-flex">
                                        <span class="for-text">昵称：</span>
                                        <p class="text">琳琳</p>
                                    </div>
                                    <div class="text-flex">
                                        <span class="for-text">地址：</span>
                                        <p class="text">郑州市管城回族区茂祥大厦九楼</p>
                                    </div>
                                    <div class="text-flex">
                                        <span class="for-text">等级：</span>
                                        <p class="text">
                                            会员
                                            <span class="edit">设置</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;黄金会员
                                            <span class="edit">修改</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="text-flex">
                                        <span class="for-text">城市：</span>
                                        <p class="text">郑州市</p>
                                    </div>
                                    <div class="text-flex">
                                        <span class="for-text">电话：</span>
                                        <p class="text">178678637983</p>
                                    </div>
                                    <div class="text-flex">
                                        <span class="for-text">分销等级：</span>
                                        <p class="text">一级</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="title-wrap">
                            <h4 class="title">推荐客户列表</h4>
                        </div>
                        <div class="info-wrap">
                            <div class="info-table">
                                <table class="table" id="table"></table>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="title-wrap">
                            <h4 class="title">团队成员</h4>
                        </div>
                        <div class="info-wrap">
                            <div class="info-table">
                                <table class="table" id="teamtable"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-side">
            <div class="side-catalog">
                <div class="side-bar">
                    <div class="bar-wrap">
                        <span class="start"></span>
                        <span class="end"></span>
                    </div>
                </div>
                <dl class="side-list">
                    <dt>基本信息</dt>
                    <dt>推荐客户列表</dt>
                    <dt>团队成员</dt>
                    <span class="icon-timeBar"></span>
                </dl>
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