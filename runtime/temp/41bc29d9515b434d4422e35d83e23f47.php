<?php /*a:2:{s:51:"D:\wamp64\www\tp5\app\admin\view\auth\edit_nav.html";i:1571377999;s:42:"D:\wamp64\www\tp5\app\admin\view\base.html";i:1571803050;}*/ ?>
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

<div class="container" id="container">
    <div class="container-wrap">
        <div class="home-panel">
            <div class="info-container clear">
                <div class="vip-info">
                    <div class="info-item">
                        <div class="title-wrap">
                            <h4 class="title"><?php echo htmlentities($title); ?></h4>
                        </div>
                        <div class="info-wrap layui-form">
                            <div class="info-form">
                                <div class="form-item">
                                    <label class="layui-form-label" for="">导航名称：</label>
                                    <input class="input" name="limit_name" value="<?php echo htmlentities((isset($info['limit_name']) && ($info['limit_name'] !== '')?$info['limit_name']:'')); ?>" type="text">
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">顶级导航:</label>
                                    <div class="layui-input-inline">
                                        <input type="text" id="tree" lay-filter="tree" class="layui-input" name="parent_id" value="<?php echo htmlentities((isset($info['parent_id']) && ($info['parent_id'] !== '')?$info['parent_id']:0)); ?>">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label class="layui-form-label" for="">模块名：</label>
                                    <input name="module" value="<?php echo htmlentities((isset($info['module']) && ($info['module'] !== '')?$info['module']:'')); ?>" class="input" type="text">
                                </div>
                                <div class="form-item">
                                    <label class="layui-form-label" for="">控制器名：</label>
                                    <input name="controller" value="<?php echo htmlentities((isset($info['controller']) && ($info['controller'] !== '')?$info['controller']:'')); ?>" class="input" type="text">
                                </div>
                                <div class="form-item">
                                    <label class="layui-form-label" for="">方法名：</label>
                                    <input name="action" value="<?php echo htmlentities((isset($info['action']) && ($info['action'] !== '')?$info['action']:'')); ?>" class="input" type="text">
                                </div>
                                <div class="form-item">
                                    <label class="layui-form-label" for="">图标：</label>
                                    <input name="icon" value="<?php echo htmlentities((isset($info['icon']) && ($info['icon'] !== '')?$info['icon']:'')); ?>" class="input" type="text">
                                    <button type="button" class="layui-btn layui-btn-xs"><a target="_blank" href="https://www.layui.com/doc/element/icon.html" style="color: #fff;">选择图标</a> </button>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">是否显示:</label>
                                    <div class="layui-input-block">
                                        <input type="checkbox" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['display'] == 1): ?>  checked=""  <?php endif; ?><?php endif; ?> checked="" name="display" lay-skin="switch" lay-filter="switchTest" lay-text="显示|隐藏">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label class="layui-form-label" for="">排序：</label>
                                    <input name="sort" value="<?php echo htmlentities((isset($info['sort']) && ($info['sort'] !== '')?$info['sort']:'')); ?>" class="input" type="text">
                                </div>
                                <input type="hidden" value="<?php echo htmlentities((isset($info['limit_id']) && ($info['limit_id'] !== '')?$info['limit_id']:'')); ?>" name="limit_id">
                                <button class="blue-btn"  lay-submit="" lay-filter="btn">立即提交</button>
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
    layui.use(['form','treeSelect'],function () {
        var form = layui.form;
        var id = $("input[name=parent_id]").val();
        form.render();
        var treeSelect = layui.treeSelect;
        treeSelect.render({
            elem: '#tree',
            data: "<?php echo url('auth/apiAddNav'); ?>",
            placeholder: '顶级导航',
            search: true,
            style: {
                folder: {
                    enable: true
                },
                line: {
                    enable: true
                }
            },
            success: function (d) {
                treeSelect.checkNode('tree', id); //默认选中
            }
        });
        form.on('submit(btn)',function (data) {
           var id = data.field.limit_id;
            if (data.field.display === 'on'){
                data.field.display = 1;
            }else{
                data.field.display = 0;
            }
            if (id === ''){
                $.ajax({
                    url:"<?php echo url('auth/addNav'); ?>",
                    type:"post",
                    data:data.field,
                    success:function (re) {
                        if (re.code === 9){
                            layer.msg(re.msg,function () {
                                window.location.href = "<?php echo url('auth/navList'); ?>";
                            })
                        }else{
                            layer.msg(re.msg);
                        }
                    }
                })
            }else{
                $.ajax({
                    url:"<?php echo url('auth/editNav'); ?>",
                    type:"post",
                    data:data.field,
                    success:function (re) {
                        if (re.code === 13){
                            layer.msg(re.msg,function () {
                                window.location.href = "<?php echo url('auth/navList'); ?>";
                            })
                        }else{
                            layer.msg(re.msg);
                        }
                    }
                })
            }
        })
    })
</script>

</body>
</html>