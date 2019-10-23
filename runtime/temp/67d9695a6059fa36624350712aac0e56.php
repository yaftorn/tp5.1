<?php /*a:2:{s:56:"D:\wamp64\www\tp5\app\admin\view\orders\orders_list.html";i:1571824972;s:42:"D:\wamp64\www\tp5\app\admin\view\base.html";i:1571815470;}*/ ?>
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
            <div class="form-flex">
                <div class="order-form layui-form">
                    <div class="order-item">
                        <div class="order-box">
                            <label class="label" for="">订单编号：</label>
                            <div class="order">
                                <input class="input" name="content" type="text">
                            </div>
                        </div>
                    </div>
                    <button class="order-btn" lay-submit="" lay-filter="formDemo">点击查询</button>
                </div>
            </div>
        </div>
        <div class="home-panel mt-15">
            <ul class="tab-wrap">
                <li>
                    <a href="javascript:;" data-type="all" class="on active">全部订单</a>
                </li>
                <li>
                    <a href="javascript:;" data-type="0" class="on">待支付</a>
                </li>
                <li>
                    <a href="javascript:;" data-type="1" class="on">待发货</a>
                </li>
                <li>
                    <a href="javascript:;" data-type="2" class="on">待收货</a>
                </li>
                <li>
                    <a href="javascript:;" data-type="3" class="on">已完成</a>
                </li>
            </ul>
            <table id="table" class="layui-table" lay-filter="table">
            </table>
        </div>
    </div>
</div>
<script type="text/html" id="caozuo">
    <a class="layui-btn layui-btn-xs" lay-event="info">详情</a>
    <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="delete">删除</a>
    {{# if(d.state == 0){ }}
    {{# }else if(d.orders_state == 1){ }}
    <a class="layui-btn layui-btn-xs" lay-event="shipments">发货</a>
    {{# }else if(d.orders_state == 2){ }}
    <a class="layui-btn layui-btn-xs" lay-event="complete">确认收货</a>
    {{# } }}
</script>
<script type="text/html" id="shipments">
    <div class="table_content">
            <div class="layui-form-item search-item" >
                <label class="layui-form-label">快递名称：</label>
                <div class="layui-input-inline">
                    <input type="text" name="post_name" class="layui-input"/>
                </div>
            </div>
        <div class="layui-form-item search-item" >
            <label class="layui-form-label">运单号：</label>
            <div class="layui-input-inline">
                <input type="text" name="post_sn" class="layui-input"/>
            </div>
        </div>
    </div>
</script>

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
    layui.use(['table','form'],function (data) {
        var table = layui.table;
        var form = layui.form;

        var layer = layui.layer;
        table.render({
            elem: '#table'
            ,method:"post"
            ,id:"reload"
            ,url: "<?php echo url('orders/apiOrdersList'); ?>" //数据接口
            ,page: true //开启分页
            ,totalRow:true
            ,cols: [[ //表头
                {field: 'orders_sn', title: '订单号',sort:true,totalRowText:'合计'}
                ,{field: 'orders_price', title: '订单价格',sort:true,totalRow:true}
                ,{field: 'orders_state', title: '订单状态',templet:"#state"}
                ,{field: 'goods_name', title: '商品名称',}
                ,{field: 'name', title: '姓名',}
                ,{field: 'tel', title: '电话',}
                ,{field: 'address', title: '收货地址',}
                ,{field: 'pay_time', title: '支付时间',sort:true}
                ,{title: '操作',width:200,templet:'#caozuo'}
            ]]
        })
        $(".on").click(function () {
            var state = $(this).attr('data-type');

            $(".on").removeClass('active');
            $(this).addClass('active');
            table.reload('reload',{
                where:{state:state}
            })
        });
        form.on('submit(formDemo)',function (data) {
            //表格重载
            table.reload('reload', {
                page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: data.field
            });
            return false;
        })
        //监听工具条
        table.on('tool(table)', function(obj){ //注：tool 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            if(obj.event === 'edit'){
                window.location.href="<?php echo url('article/editArticle'); ?>?article_id="+data.article_id;
            } else if(obj.event === 'delete'){
                layer.confirm('确定要删除吗?删除后不可恢复', function(index){
                    $.ajax({
                        url:"<?php echo url('orders/delOrders'); ?>",
                        type:"get",
                        data:{orders_id:data.orders_id},
                        success:function (re) {
                            if (re.code == 15){
                                layer.msg(re.msg,function () {
                                    window.location.reload();
                                });
                            }else{
                                layer.msg(re.msg);
                            }
                        }
                    })
                });
            }else if(obj.event === 'shipments'){
                layer.open({
                    title:"运单号",
                    type:1,
                    area: ['400px', '210px'],
                    content:$("#shipments").html(),
                    btn:['确定','取消'],
                    yes:function () {
                        var post_sn = $("input[name='post_sn']").val();
                        var post_name = $("input[name='post_name']").val();
                        if(post_sn == ''){
                            layer.msg('请填写快递单号');
                            return false;
                        }
                        if(post_name == ''){
                            layer.msg('请填写快递名称');
                            return false;
                        }
                        $.ajax({
                            url:"<?php echo url('orders/shipments'); ?>",
                            type:"post",
                            data:{orders_id:data.orders_id,post_sn:post_sn,post_name:post_name},
                            success:function (data) {
                                if(data.code == 17){
                                    layer.msg('发货成功');
                                    table.reload('reload');
                                    layer.closeAll();
                                }
                            }
                        })
                    }
                })
            }else if(obj.event === 'complete'){
                layer.confirm('确定要确认收货吗?确认后不可恢复', function(index){
                    $.ajax({
                        url:"<?php echo url('orders/complete'); ?>",
                        type:"get",
                        data:{orders_id:data.orders_id},
                        success:function (re) {
                            if (re.code == 19){
                                layer.msg(re.msg,function () {
                                    window.location.reload();
                                });
                            }else{
                                layer.msg(re.msg);
                            }
                        }
                    })
                });
            }else if (obj.event === 'info'){
                $.ajax({
                    url:"<?php echo url('orders/ordersInfo'); ?>",
                    data:{orders_id:data.orders_id},
                    success:function (re) {
                        layer.open({
                            title:"订单详情",
                            type:1,
                            content:re,
                            area:['800px','700px']
                        })
                    }
                })
            }
        });
    })
</script>

</body>
</html>