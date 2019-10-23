<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/24
 * Time: 16:42
 */

namespace app\common\model;


use think\Model;

class Set extends Model
{
    protected $table = "yaf_site";
    /**
     * 查询一条信息
     */
    public function getInfo(){
        return $this->where(['site_id'=>1])->find();
    }
    /**
     * 更新
     */
    public function edit($where,$data){
        return  $this->where($where)->update($data);

    }
}