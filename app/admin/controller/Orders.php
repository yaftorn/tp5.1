<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/10/23
 * Time: 15:18
 */

namespace app\admin\controller;


use think\App;

class Orders extends Base
{
    protected $orders;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->orders = new \app\common\model\Orders();
    }

    /**
     * 订单列表
     */
    public function ordersList(){
        return $this->fetch();
    }
    /**
     * 订单列表接口
     */
    public function apiOrdersList(){
        $page = request()->param('page',1);
        $limit = request()->param('limit',10);
        $content = request()->param('content');
        $state = request()->param('state');
        $where = [];
        if (!empty($content)){
            $where[] = ['orders_sn|goods_name','like',"%$content%"];
        }
        if ($state !== 'all'&& isset($state)){
            $where[] = ['orders_state','=',$state];
        }
        $list = $this->orders->where($where)->page($page)->limit($limit)->order('addtime desc')->select();
        $count = $this->orders->where($where)->count();

        return api($list,$count);
    }
    /*
     * 订单详情
     */
    public function ordersInfo(){
        $orders_id = request()->param('orders_id');
        $info = $this->orders->where('orders_id',$orders_id)->find();

        return $this->fetch('',['info'=>$info]);
    }
    /**
     * 提交发货
     */
    public function shipments(){
        $data = request()->param();
        $re = $this->orders->where('orders_id',$data['orders_id'])->update([
           'orders_state' => 2,
            'post_name'   => $data['post_name'],
            'post_sn'   => $data['post_sn'],
            'post_time'   => time(),
        ]);
        if ($re){
            return adminMsg(17);
        }
        return adminMsg(18);
    }
    /**
     * 确认收货
     */
    public function complete(){
        $orders_id = request()->param('orders_id');
        $re = $this->orders->where('orders_id',$orders_id)->update([
            'orders_state' => 3,
            'suretime'   => time(),
        ]);
        if ($re){
            return adminMsg(19);
        }
        return adminMsg(20);
    }
    /**
     * 删除订单
     */
    public function delOrders(){
        $orders_id = request()->param('orders_id');
        $re = $this->orders->where('orders_id',$orders_id)->delete();
        if ($re){
            return adminMsg(15);
        }
        return adminMsg(16);
    }
}