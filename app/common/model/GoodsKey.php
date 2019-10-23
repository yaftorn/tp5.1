<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/10/18
 * Time: 16:39
 */

namespace app\common\model;


use think\Model;

class GoodsKey extends Model
{
    /*
         * 查询列表
         */
    public function getList($where=[],$field="*",$page=1,$limit=10){

        return  $this->field($field)
            ->where($where)
            ->limit($limit)
            ->page($page)
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