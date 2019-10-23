<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/20
 * Time: 10:57
 */

namespace app\common\model;


class Role extends Base
{
    /*
     * 查询列表
     */
    public function getList($where=[],$field="*",$page=1,$limit=10){
        $order = [
            'role_addtime' => 'desc'
        ];
        return  $this->field($field)
            ->where($where)
            ->withAttr('role_addtime', function($value, $data) {
                return date('Y-m-d H:i:s',$value);
            })
            ->limit($limit)
            ->page($page)
            ->order($order)
            ->select();
    }

    /**
     * @param $where
     * @return array|mixed|\PDOStatement|string|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 查询一条信息
     */
    public function getInfo($where){
        return $this->where($where)->find();

    }
    /**
     * 更新
     */
    public function edit($where,$data){
        return  $this->where($where)->update($data);

    }
    /**
     * 新增
     */
    public function add($data){
        return  $this->insert($data);
    }
    /**
     * 删除
     */
    public function del($where){
        return $this->where($where)->delete();
    }
}