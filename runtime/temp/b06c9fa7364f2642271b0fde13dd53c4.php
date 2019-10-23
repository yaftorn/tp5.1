<?php /*a:2:{s:50:"D:\wamp64\www\tp5\app\admin\view\set\set_info.html";i:1569642274;s:42:"D:\wamp64\www\tp5\app\admin\view\base.html";i:1571815470;}*/ ?>
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



        
<div class="page-bar">
    <h4 class="title"><?php echo htmlentities($title); ?></h4>
</div>
<style>
    .layui-form-item .layui-input-company {width: auto;padding-right: 10px;line-height: 38px;}
</style>
<div class="container" id="container">
    <div class="container-wrap">
        <div class="home-panel">
            <div class="info-container clear">
                <div class="vip-info" style="width:1200px">
                    <div class="info-item">
                        <div class="title-wrap">
                            <h4 class="title"><?php echo htmlentities($title); ?></h4>
                        </div>
                        <div class="info-wrap">
                            <div class="layuimini-container">
                                <div class="layuimini-main">
                                    <div class="layui-form layuimini-form">
                                        <div class="layui-form-item">
                                            <label class="layui-form-label required">网站名称:</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="site_name" lay-verify="required" lay-reqtext="请输入网站名称" placeholder="请输入网站名称"  value="<?php echo htmlentities((isset($info['site_name']) && ($info['site_name'] !== '')?$info['site_name']:'')); ?>" class="layui-input">
                                                <div class="layui-form-mid layui-word-aux">填写自己部署网站的名称。</div>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">最大文件上传:</label>
                                            <div class="layui-input-inline" style="width: 80px;">
                                                <input type="text" name="file_size" lay-verify="number" value="<?php echo htmlentities((isset($info['file_size']) && ($info['file_size'] !== '')?$info['file_size']:'')); ?>" class="layui-input">
                                            </div>
                                            <div class="layui-input-inline layui-input-company">KB</div>
                                            <div class="layui-form-mid layui-word-aux">提示：1 M = 1024 KB</div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">上传文件类型:</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="file_type"  value="<?php echo htmlentities((isset($info['file_type']) && ($info['file_type'] !== '')?$info['file_type']:'')); ?>" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="">LOGO：</label>
                                            <div class="layui-upload-drag" id="logo">
                                                <i class="layui-icon"></i>
                                                <p>点击上传，或将文件拖拽到此处</p>
                                            </div>
                                                <img style="width: 80px;" class="layui-upload-img" src="<?php echo htmlentities((isset($info['site_logo']) && ($info['site_logo'] !== '')?$info['site_logo']:'')); ?>" id="demo">
                                                <input type="hidden" value="<?php echo htmlentities((isset($info['site_logo']) && ($info['site_logo'] !== '')?$info['site_logo']:'')); ?>" name="site_logo">
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="">二维码：</label>
                                            <div class="layui-upload-drag" id="code">
                                                <i class="layui-icon"></i>
                                                <p>点击上传，或将文件拖拽到此处</p>
                                            </div>
                                            <img style="width: 120px;" class="layui-upload-img" src="<?php echo htmlentities((isset($info['site_code']) && ($info['site_code'] !== '')?$info['site_code']:'')); ?>" id="demo1">
                                            <input type="hidden" name="site_code" value="<?php echo htmlentities((isset($info['site_code']) && ($info['site_code'] !== '')?$info['site_code']:'')); ?>">
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label required">联系方式:</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="site_tel"  value="<?php echo htmlentities((isset($info['site_tel']) && ($info['site_tel'] !== '')?$info['site_tel']:'')); ?>" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label required">邮箱:</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="site_email"  value="<?php echo htmlentities((isset($info['site_email']) && ($info['site_email'] !== '')?$info['site_email']:'')); ?>" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text">
                                            <label class="layui-form-label required">首页标题:</label>
                                            <div class="layui-input-block">
                                                <textarea name="site_title" class="layui-textarea"><?php echo htmlentities((isset($info['site_title']) && ($info['site_title'] !== '')?$info['site_title']:'')); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text">
                                            <label class="layui-form-label">META关键词:</label>
                                            <div class="layui-input-block">
                                                <textarea name="site_keywords" class="layui-textarea" placeholder="多个关键词用英文状态 , 号分割"><?php echo htmlentities((isset($info['site_keywords']) && ($info['site_keywords'] !== '')?$info['site_keywords']:'')); ?>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text">
                                            <label class="layui-form-label">META描述:</label>
                                            <div class="layui-input-block">
                                                <textarea name="site_description" class="layui-textarea"><?php echo htmlentities((isset($info['site_description']) && ($info['site_description'] !== '')?$info['site_description']:'')); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text">
                                            <label class="layui-form-label required">版权信息:</label>
                                            <div class="layui-input-block">
                                                <textarea name="site_copyright" class="layui-textarea"><?php echo htmlentities((isset($info['site_copyright']) && ($info['site_copyright'] !== '')?$info['site_copyright']:'')); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <div class="layui-input-block">
                                                <button lay-submit="" lay-filter="btn" class="blue-btn">立即提交</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

<script>
    layui.use('upload', function(){
        var upload = layui.upload
        var form = layui.form
        //拖拽上传
        upload.render({
            elem: '#logo'
            ,url: "<?php echo url('base/upload'); ?>"
            ,done: function(res){

               if (res.code === 200){
                   layer.msg(res.msg,function () {
                       $("#demo").attr('src',res.src);
                       $("input[name=site_logo]").val(res.src);
                   });
               }else{
                   layer.msg(res.msg);
               }
            }
            ,accept: 'file' //允许上传的文件类型
            ,size: 2048 //最大允许上传的文件大小 2m
        });
        upload.render({
            elem: '#code'
            ,url: "<?php echo url('base/upload'); ?>"
            ,done: function(res){
                if (res.code === 200){
                    layer.msg(res.msg,function () {
                        $("#demo1").attr('src',res.src);
                        $("input[name=site_code]").val(res.src);
                    });
                }else{
                    layer.msg(res.msg);
                }
            }
            ,accept: 'file' //允许上传的文件类型
            ,size: 2048 //最大允许上传的文件大小 2m
        });
        form.on('submit(btn)',function (data) {
            $.ajax({
                url:"<?php echo url('set/setInfo'); ?>",
                data:data.field,
                type:"post",
                success:function (re) {
                    if (re.code === 13){
                        layer.msg(re.msg,function () {
                            window.location.reload();
                        })
                    }else{
                        layer.msg(re.msg);
                    }
                }
            })
        })

    })
</script>

</body>
</html>