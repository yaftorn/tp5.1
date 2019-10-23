<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/10/18
 * Time: 11:27
 */

namespace app\admin\controller;


use think\App;
use think\Db;
class Goods extends Base
{
    protected $goods_category;
    protected $key;
    protected $goods_value;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->goods_category = new \app\common\model\GoodsCategory();
        $this->key = new \app\common\model\GoodsKey();
        $this->goods_value = new \app\common\model\GoodsValue();
    }
    /*
     * 商品列表
     */
    public function goodsList(){
        return $this->fetch();
    }

    /**
     * 商品列表接口
     */
    public function apiGoodsList(){

    }
    /*
     * 添加商品
     */
    public function addGoods(){
        if (request()->isPost()){

        }
        //商品属性
        $key = $this->key->getList();
        return $this->fetch('',['key'=>$key]);
    }
    /**
     * 获取属性值
     */
    public function getValue(){
        $arr = request()->param('arr/a',[]);
        $item = [];
        foreach($arr as $v){
            $valueArr = [];
            $info = $this->key->getInfo(['key_id'=>$v]);
            $valueList = $this->goods_value->where('key_id',$v)->select();
            foreach ($valueList as $vv){
               $valueArr[] =[
                'id' => $vv['value_id'],
                'name' => $vv['value_name'],
               ];
            }
            $item[]=[
                'id' => $info['key_id'],
                'name' => $info['key_name'],
                'sub' =>$valueArr
            ];
        }

        return json_encode($item);
    }
    /**
     * 分类列表
     */
    public function goodsCategory(){
        return $this->fetch();
    }
    /**
     * 分类列表接口
     */
    public function apiGoodsCategory(){
        $list = $this->goods_category->getList();
        return json($list);
    }
    /**
     * 添加/编辑分类接口
     */
    public function apiAddCategory(){
        $list = $this->goods_category->getList();
        $Ctg = Category($list);
        return json($Ctg);
    }
    /**
     * 添加分类
     */
    public function addCategory(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Goods.addCategory');
            if ($check != true){
                return adminMsg(1,'',$check);
            
            }
            $res = $this->goods_category->add($data);
            if ($res){
                return adminMsg(9);
            }
            return adminMsg(10);
        }
        return $this->fetch();
    }
    /**
     * 编辑分类
     */
    public function editCategory(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Goods.editCategory');
            if ($check != true){
                return adminMsg(1,'',$check);
            }
            $res = $this->goods_category->edit(['category_id'=>$data['category_id']],$data);
            if ($res){
                return adminMsg(13);
            }
            return adminMsg(14);
        }
        $id = request()->param();
        $info = $this->goods_category->getInfo($id);

        return $this->fetch('add_category',['info'=>$info]);
    }
    /**
     * 删除分类
     */
    public function delCategory(){
        $id = request()->param();
        $check = $this->Validate($id,'app\admin\validate\Goods.delCategory');
        if ($check != true){
            return adminMsg(1,'',$check);
        }
        $res = $this->goods_category->del($id);
        if ($res){
            return adminMsg(15);
        }
        return adminMsg(16);
    }
    /**
     * 商品属性
     */
    public function goodsKey(){
        return $this->fetch();

    }
    /**
     * 商品属性接口
     */
    public function apiGoodsKey(){
        $page = request()->param('page',1);
        $limit = request()->param('limit',10);
        $list = $this->key->order('sort asc')->page($page)->limit($limit)->select();
        foreach($list as $v){
            $value = $this->goods_value->where('key_id',$v['key_id'])->select();
            $arr = [];
            foreach ($value as $vv){
                $arr[] = $vv['value_name'];
            }
            $v['value'] = $arr;
        }
        $count = $this->key->count();
        return api($list,$count);
    }
    /**
     * 添加商品属性
     */
    public function addKey(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Goods.addKey');
            if ($check != true){
                return adminMsg(1,'',$check);
            }
            $this->goods_value->startTrans();
            try{
                $value = $data['value'];
                unset($data['value']);
                $data['addtime'] = time();
                $id = $this->key->insertGetId($data);
                $arr = [];
                foreach($value as $v){
                    $array = [
                        'key_id' => $id,
                        'value_name' => $v,
                    ];
                    $arr[] = $array;
                }
                $this->goods_value->insertAll($arr);
                $this->goods_value->commit();
                $re = true;
            }catch (\Exception $e){
                $this->goods_value->rollback();
                $re = false;
            }
            if ($re){
                return adminMsg(9);
            }
            return adminMsg(10);
        }
        return $this->fetch('',['value'=>json_encode([])]);
    }
    /*
     * 编辑商品属性
     */
    public function editKey(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Goods.editKey');
            if ($check != true){
                return adminMsg(1,'',$check);
            }
            $this->goods_value->startTrans();
            try{
                $value = $data['value'];
                unset($data['value']);
                $id = $this->key->where('key_id',$data['key_id'])->update($data);
                $arr = [];
                $this->goods_value->where('key_id',$data['key_id'])->delete();
                foreach($value as $v){
                    $array = [
                        'key_id' => $data['key_id'],
                        'value_name' => $v,
                    ];
                    $arr[] = $array;
                }

                $this->goods_value->insertAll($arr);
                $this->goods_value->commit();
                $re = true;
            }catch (\Exception $e){
                $this->goods_value->rollback();
                $re = false;
            }
            if ($re){
                return adminMsg(13);
            }
            return adminMsg(14);
        }

        $id = request()->param();
        $info = $this->key->where($id)->find();
        $value = $this->goods_value->where(['key_id'=>$info['key_id']])->select();
        $arr = [];
        foreach ($value as $v){
            $arr[] = $v['value_name'];
        }
        return $this->fetch('add_key',[
            'info' => $info,
            'value' => json_encode($arr)
        ]);
    }
}