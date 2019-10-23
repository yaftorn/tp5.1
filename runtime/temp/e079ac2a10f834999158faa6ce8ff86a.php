<?php /*a:2:{s:53:"D:\wamp64\www\tp5\app\admin\view\goods\add_goods.html";i:1571791504;s:42:"D:\wamp64\www\tp5\app\admin\view\base.html";i:1571815470;}*/ ?>
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

    .img { width: 90px; height: 90px; margin: 0; }
    #slide-pc-priview .item_img{float: left}
    .pic-more {width:100%;float: left; margin: 10px 0px 0px 0px;}
    .pic-more li { width:90px; float: left; margin-right: 5px;float: left}
    .pic-more li .layui-input { display: initial; }
    .pic-more li a { position: absolute; top: 0; display: block; }
    .pic-more li a i { font-size: 24px; background-color: #008800; }
    #slide-pc-priview .item_img img{ width: 90px; height: 90px;}
    #slide-pc-priview li{position: relative; }
    #slide-pc-priview li .operate{ color: #000; display: none;}
    #slide-pc-priview li .toleft{ position: absolute;top: 40px; left: 1px; cursor:pointer;}
    #slide-pc-priview li .toright{ position: absolute;top: 40px; right: 1px;cursor:pointer;}
    #slide-pc-priview li .close{position: absolute;top: 5px; right: 5px;cursor:pointer;}
    #slide-pc-priview li:hover .operate{ display: block;}
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
                                            <label class="layui-form-label required">商品名称:</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="goods_name" lay-verify="required" lay-reqtext="请输入标题" placeholder="请输入标题"  value="<?php echo htmlentities((isset($info['article_title']) && ($info['article_title'] !== '')?$info['article_title']:'')); ?>" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">选择分类:</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="tree" lay-filter="tree" class="layui-input" name="category_id" value="<?php echo htmlentities((isset($info['category_id']) && ($info['category_id'] !== '')?$info['category_id']:0)); ?>">
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text">
                                            <label class="layui-form-label">摘要:</label>
                                            <div class="layui-input-block">
                                                <textarea name="goods_description" class="layui-textarea"><?php echo htmlentities((isset($info['goods_description']) && ($info['goods_description'] !== '')?$info['goods_description']:'')); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="">缩略图：</label>
                                            <div class="layui-upload-drag" id="logo">
                                                <i class="layui-icon"></i>
                                                <p>点击上传，或将文件拖拽到此处</p>
                                            </div>
                                            <img style="width: 80px;" class="layui-upload-img" src="<?php echo htmlentities((isset($info['goods_thumb']) && ($info['goods_thumb'] !== '')?$info['goods_thumb']:'')); ?>" id="demo">
                                            <input type="hidden" value="<?php echo htmlentities((isset($info['goods_thumb']) && ($info['goods_thumb'] !== '')?$info['goods_thumb']:'')); ?>" name="article_thumb">
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="">相册：</label>
                                            <div style="margin-left: 150px">
                                                <button type="button" class="layui-btn" id="test2">多图片上传</button>
                                                <div class="pic-more">
                                                    <ul class="pic-more-upload-list" id="slide-pc-priview">
                                                        <?php if(!(empty($info['goods_photos']) || (($info['goods_photos'] instanceof \think\Collection || $info['goods_photos'] instanceof \think\Paginator ) && $info['goods_photos']->isEmpty()))): foreach($info['goods_photos'] as $v): ?>
                                                        <li class="item_img">
                                                            <div class="operate">
                                                                <i class="toleft layui-icon">《</i>
                                                                <i class="toright layui-icon">》</i>
                                                                <i class="layui-icon layui-icon-delete close"></i>
                                                            </div>
                                                            <img src="<?php echo htmlentities($v); ?>" class="img" >
                                                            <input type="hidden" name="goods_photos[]" value="<?php echo htmlentities($v); ?>" />
                                                        </li>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text">
                                            <label class="layui-form-label">商品属性:</label>
                                            <div class="layui-input-block" >
                                                <input type="radio" name="goods_value" title="单属性" value="0"  lay-filter="sku" checked="">
                                                <input type="radio" name="goods_value" title="多属性"  value="1" lay-filter="sku">
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text one">
                                            <label class="layui-form-label">市场价:</label>
                                            <div class="layui-input-inline" >
                                                <input type="text" name="market_price" placeholder="请输入市场价"  value="" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text one">
                                            <label class="layui-form-label">销售价:</label>
                                            <div class="layui-input-inline" >
                                                <input type="text" name="sell_price" placeholder="请输入销售价"  value="" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text one">
                                            <label class="layui-form-label">成本价:</label>
                                            <div class="layui-input-inline" >
                                                <input type="text" name="cost_price" placeholder="请输入成本价"  value="" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text more" style="display: none">
                                            <label class="layui-form-label">选择属性:</label>
                                            <div class="layui-input-block" >
                                                <?php foreach($key as $v): ?>
                                                <input type="checkbox" name="key" title="<?php echo htmlentities($v['key_name']); ?>" value="<?php echo htmlentities($v['key_id']); ?>" lay-filter="key">
                                                <?php endforeach; ?>
                                            </div>
                                           <div id="sku" data-item="" data-data="" style="margin-left: 100px"></div>
                                        </div>
                                        <div class="layui-form-item layui-form-text">
                                            <label class="layui-form-label">详情:</label>
                                            <div class="layui-input-block">
                                                <textarea name="goods_content" id="edit" cols="30" rows="10"><?php echo (isset($info['goods_content']) && ($info['goods_content'] !== '')?$info['goods_content']:''); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label ">销售量:</label>
                                            <div class="layui-input-inline">
                                                <input type="text" name="sales" placeholder="请输入销售量"  value="<?php echo htmlentities((isset($info['sales']) && ($info['sales'] !== '')?$info['sales']:'')); ?>" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label">排序:</label>
                                            <div class="layui-input-inline">
                                                <input type="text" name="sort"  placeholder="请输入排序"  value="<?php echo htmlentities((isset($info['sort']) && ($info['sort'] !== '')?$info['sort']:'0')); ?>" class="layui-input">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">是否上架:</label>
                                            <div class="layui-input-block">
                                                <input type="checkbox" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['goods_status'] == 1): ?>  checked=""  <?php endif; else: ?> checked="" <?php endif; ?> name="goods_status"  lay-skin="switch" lay-text="是|否">
                                            </div>
                                        </div>
                                        <div class="layui-form-item" pane="">
                                            <label class="layui-form-label">是否推荐:</label>
                                            <div class="layui-input-block">
                                                <input type="checkbox"  name="recommend" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['recommend'] == 1): ?>  checked=""  <?php endif; ?><?php endif; ?> lay-skin="switch" lay-text="是|否">
                                            </div>
                                        </div>
                                        <input type="hidden" name="goods_id" value="<?php echo htmlentities((isset($info['goods_id']) && ($info['goods_id'] !== '')?$info['goods_id']:'')); ?>">
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

    layui.use(['form','upload','util','tinymce','treeSelect','sku'], function(){
        var upload = layui.upload
        var form = layui.form
        var sku = layui.sku
        var tinymce = layui.tinymce
        var treeSelect = layui.treeSelect
        var edit = tinymce.render({
            elem: "#edit"
            , height: 600
            , width:'100%'
        });
        treeSelect.render({
            elem: '#tree',
            data: "<?php echo url('goods/apiAddCategory'); ?>",
            placeholder: '选择分类',
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
                var category_id = $("input[name=category_id]").val();
                treeSelect.checkNode('tree', category_id); //默认选中
            }
        });
        //拖拽上传
        upload.render({
            elem: '#logo'
            ,url: "<?php echo url('base/upload'); ?>"
            ,done: function(res){

                if (res.code === 200){
                    layer.msg(res.msg,function () {
                        $("#demo").attr('src',res.src);
                        $("input[name=article_thumb]").val(res.src);
                    });
                }else{
                    layer.msg(res.msg);
                }
            }
            ,accept: 'file' //允许上传的文件类型
            ,size: 2048 //最大允许上传的文件大小 2m
        });
        //多图片上传
        upload.render({
            elem: '#test2'
            ,url: "<?php echo url('base/upload'); ?>"
            ,multiple: true
            ,done: function(res){
                //上传完毕
                $('#slide-pc-priview').append('<li class="item_img"><div class="operate"><i class="toleft layui-icon">《</i><i class="toright layui-icon">》</i><i class="layui-icon layui-icon-delete close"></i> </div><img src="' + res.src + '" class="img" ><input type="hidden" name="article_moreimg[]" value="' + res.src + '" /></li>');
            }
        });

        //多图片上传
        upload.render({
            elem: document.getElementsByClassName("tt")
            ,url: "<?php echo url('base/upload'); ?>"
            ,multiple: true
            ,done: function(res, index, upload){
                //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
                var item = this.item;
            }
        });

        // $("#sku").on("click",".test3",function(){
        //
        // });
        //点击多图上传的X,删除当前的图片
        $("body").on("click",".close",function(){
            $(this).closest("li").remove();
        });
        //多图上传点击<>左右移动图片
        $("body").on("click",".pic-more ul li .toleft",function(){
            var li_index=$(this).closest("li").index();
            if(li_index>=1){
                $(this).closest("li").insertBefore($(this).closest("ul").find("li").eq(Number(li_index)-1));
            }
        });
        $("body").on("click",".pic-more ul li .toright",function(){
            var li_index=$(this).closest("li").index();
            $(this).closest("li").insertAfter($(this).closest("ul").find("li").eq(Number(li_index)+1));
        });

        $("body").on("click",".pic-more-upload-list li img",function(e) {
            layer.photos({
                photos: {"data": [{"src": e.target.src}]}
            });
        })
        form.on('radio(sku)', function(data){
            if (data.value == 0){
                $(".one").show();
                $(".more").hide();
            }else if(data.value == 1){
                $(".one").hide();
                $(".more").show();
            }
        });
        //复选框选中事件
        form.on('checkbox(key)', function(data){
           $("#sku").empty();
            var arr = [];
            $("input[name='key']:checked").each(function() {
                arr.push($(this).val());
            })
            $.ajax({
                url:"<?php echo url('goods/getValue'); ?>",
                type:"post",
                data:{arr:arr},
                success:function (re) {
                    item = $.parseJSON(re);
                    if (item != ''){
                        var SKU = sku.init({ id:'sku', item: item});
                    }
                }
            })
        });
        form.on('submit(btn)',function (data) {
            var id = data.field.article_id;
            if (data.field.artilce_status === 'on'){
                data.field.artilce_status = 1;
            }else{
                data.field.artilce_status = 0;
            }
            if (data.field.article_recommend === 'on'){
                data.field.article_recommend = 1;
            }else{
                data.field.article_recommend = 0;
            }
            data.field.article_content = edit.getContent();
            if (id == ''){
                $.ajax({
                    url:"<?php echo url('article/addArticle'); ?>",
                    data:data.field,
                    type:"post",
                    success:function (re) {
                        if (re.code === 9){
                            layer.msg(re.msg,function () {
                                window.location.href = "<?php echo url('article/articleList'); ?>";
                            })
                        }else{
                            layer.msg(re.msg);
                        }
                    }
                })
            }else{
                $.ajax({
                    url:"<?php echo url('article/editArticle'); ?>",
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
            }

        })


    })

    // var skuimg = function (id) {
    //     layui.use(['form','upload','util','tinymce','treeSelect','sku'], function(){var upload = layui.upload
    //         upload.render({
    //             elem: "#tt"+id
    //             ,url: "<?php echo url('base/upload'); ?>"
    //             ,done: function(res){
    //             }
    //         });
    //     })
    // }

</script>

</body>
</html>