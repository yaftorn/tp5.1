<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/28
 * Time: 15:31
 */

namespace app\common\model;


use think\Model;

class Session extends Model
{
    /*
     * 插入一条数据
     */
    public function add($data){
        return $this->insert($data);
    }
    /**
     * 更新数据
     */
    public function edit($where,$data){
        return $this->where($where)->update($data);

    }
}