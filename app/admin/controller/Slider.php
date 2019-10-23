<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/25
 * Time: 11:57
 */

namespace app\admin\controller;

use app\admin\controller\Base;
use app\common\model\Slider as sliderModel;
use app\common\model\SliderType;
use think\App;

class Slider extends Base
{
    protected $slider;
    protected $slider_type;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->slider = new sliderModel();
        $this->slider_type = new SliderType();
    }

    /**
     * 位置列表
     */
    public function typeList(){

        return $this->fetch();
    }
    /**
     * 轮播图位置接口
     */
    public function apiTypeList(){
        $page = request()->param('page',1);
        $limit = request()->param('limit',10);
        $list = $this->slider_type->getList([],'',$page,$limit);
        $count = $this->slider_type->count();

        return api($list,$count);
    }
    /*
     * 添加位置
     */
    public function addType(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Slider.addType');
            if ($check != true){
                return adminMsg(1,'',$check);
            }
            $res = $this->slider_type->add($data);
            if ($res){
                return adminMsg(9);
            }
            return adminMsg(10);
        }

        return $this->fetch();
    }
    /**
     * 编辑位置
     */
    public function editType(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Slider.editType');
            if ($check != true){
                return adminMsg(1,'',$check);
            }
            $res = $this->slider_type->edit(['type_id'=>$data['type_id']],$data);
            if ($res){
                return adminMsg(13);
            }
            return adminMsg(14);
        }
        $id = request()->param();
        $info = $this->slider_type->getInfo($id);

        return $this->fetch('add_type',['info'=>$info]);
    }
    /*
     * 删除位置
     */
    public function delType(){
        $id = request()->param();
        $check = $this->Validate($id,'app\admin\validate\Slider.delType');
        if ($check != true){
            return adminMsg(1,'',$check);
        }
        $res = $this->slider_type->del($id);
        if ($res){
            return adminMsg(15);
        }
        return adminMsg(16);
    }
    /**
     * 轮播图列表
     */
    public function sliderList(){
        return $this->fetch();
    }
    /**
     * 轮播图列表接口
     */
    public function apiSliderList(){
        $content = request()->param('content');
        $page = request()->param('page',1);
        $limit = request()->param('limit',10);
        $where = [];
        if (!empty($content)){
            $where[] = ['slider_name','like',"%$content%"];
        }
        $list = $this->slider->getList($where,'',$page,$limit);
        $count = $this->slider->where($where)->count();

        return api($list,$count);
    }
    /*
     * 添加轮播图
     */
    public function addSlider(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Slider.addSlider');

            if ($check != true){
                return adminMsg(1,'',$check);
            }
            $data['slider_addtime'] = time();
            unset($data['file']);
            $res = $this->slider->add($data);
            if ($res){
                return adminMsg(9);
            }
            return adminMsg(10);
        }
        $type = $this->slider_type->getList();
        return $this->fetch('',[
            'type' => $type
        ]);
    }
    /*
     * 编辑轮播图
     */
    public function editSlider(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Slider.editSlider');

            if ($check != true){
                return adminMsg(1,'',$check);
            }
            unset($data['file']);
            $res = $this->slider->edit(['slider_id'=>$data['slider_id']],$data);
            if ($res){
                return adminMsg(13);
            }
            return adminMsg(14);
        }
        $id = request()->param();
        $type = $this->slider_type->getList();
        $info = $this->slider->getInfo($id);
        return $this->fetch('add_slider',[
            'type' => $type,
            'info' => $info,
        ]);
    }
    /*
     * 删除轮播图
     */
    public function delSlider(){
        $id = request()->param();
        $check = $this->Validate($id,'app\admin\validate\Slider.delSlider');
        if ($check != true){
            return adminMsg(1,'',$check);
        }
        $res = $this->slider->del($id);
        if ($res){
            return adminMsg(15);
        }
        return adminMsg(16);
    }
}