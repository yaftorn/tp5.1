<?php /*a:1:{s:49:"D:\wamp64\www\tp5\app\admin\view\login\login.html";i:1569035443;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>登录</title>
    <link rel="stylesheet" href="/public/static/admin/css/stadmin.min.css">
    <script src="/public/static/admin/js/jquery.min.js"></script>
    <script src="/public/static/admin/js/layui/layui.all.js"></script>
</head>
<body>
    <div class="login">
        <div class="login-wrap">
          
            <div  class="login-form layui-form">
               <h1 style="font-size: 30px;color: #5b7bfc;text-align: center;">后台管理</h1>
                <div class="login-box">
                    <div class="form-item">
                        <i class="icon-n"></i>
                        <input class="input" placeholder="请输入用户名" type="text" name="admin_account" lay-verify="required">
                    </div>
                    <div class="form-item">
                        <i class="icon-p"></i>
                        <input class="input" placeholder="请输入密码" type="password" name="admin_password" lay-verify="required">
                    </div>
                    <div class="form-item no-border">
                        <input style="width: 80px;" class="input" placeholder="请输入验证码" type="text" name="captcha" lay-verify="required">
                        <span>
                            <img src="<?php echo captcha_src(); ?>" alt="" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();">
                        </span>
                    </div>
                </div>
                <button class="login-btn" lay-submit="" lay-filter="demo2">登录</button>
            </div>
        </div>
    </div>
    <script>
        layui.use(['form','layer'],function () {
            var form = layui.form;
            var layer = layui.layer;
            form.on('submit(demo2)',function (data) {
               $.ajax({
                   url:"<?php echo url('login/checkLogin'); ?>",
                   type:"post",
                   data:data.field,
                   success:function (re) {
                       if (re.code == 5){
                           layer.msg(re.msg,function () {
                               window.location.href ="<?php echo url('index/index'); ?>";
                           });
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