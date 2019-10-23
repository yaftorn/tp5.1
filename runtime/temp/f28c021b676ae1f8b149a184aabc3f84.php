<?php /*a:1:{s:56:"D:\wamp64\www\tp5\app\admin\view\orders\orders_info.html";i:1571825079;}*/ ?>
<div class="content" style="margin: 0 20px">
    <div class="edit-news-wrap">
        <table class="layui-table">
            <tbody>
            <tr>
                <td>订单编号</td>
                <td>订单状态</td>
                <td>支付金额</td>
                <td>邮费</td>
                <td>下单时间</td>
                <td>订单备注</td>
            </tr>
            <tr>
                <td><?php echo htmlentities($info['orders_sn']); ?></td>
                <td><?php echo htmlentities($info['orders_state']); ?></td>
                <td><?php echo htmlentities($info['pay_price']); ?></td>
                <td><?php echo htmlentities($info['postage']); ?></td>
                <td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($info['addtime'])? strtotime($info['addtime']) : $info['addtime'])); ?></td>
                <td><?php echo htmlentities($info['remark']); ?></td>
            </tr>
            </tbody>
        </table>
        <h3>收货信息</h3>
        <table class="layui-table">
            <tbody>
            <tr>
                <td>姓名</td>
                <td>手机号</td>
                <td>地址</td>
            </tr>
            <tr>
                <td><?php echo htmlentities($info['name']); ?></td>
                <td><?php echo htmlentities($info['tel']); ?></td>
                <td><?php echo htmlentities($info['address']); ?></td>
            </tr>

            </tbody>
        </table>
        <?php if($info->getData('orders_state') >1): ?>
        <h3>发货信息</h3>
        <table class="layui-table">
            <tbody>
            <tr>
                <td>快递名称</td>
                <td>运单号</td>
                <td>发货时间</td>
            </tr>
            <tr>
                <td><?php echo htmlentities($info['post_name']); ?></td>
                <td><?php echo htmlentities($info['post_sn']); ?></td>
                <td><?php if(!(empty($info['post_time']) || (($info['post_time'] instanceof \think\Collection || $info['post_time'] instanceof \think\Paginator ) && $info['post_time']->isEmpty()))): ?><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($info['post_time'])? strtotime($info['post_time']) : $info['post_time'])); ?><?php endif; ?></td>
            </tr>

            </tbody>
        </table>
        <?php endif; ?>
        <h3>订单详情</h3>
        <table class="layui-table">
            <tbody>
            <tr>
                <td>商品名称</td>
                <td>图片</td>
                <td>价格</td>
                <td>数量</td>
            </tr>


            </tbody>
        </table>
    </div>
</div>