<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/17
 * Time: 15:12
 */

namespace app\admin\controller;

use think\App;
use think\Controller;
use app\common\model\Limit;
class Base extends Controller
{
    public $limit;
    public $role;
    public $adminInfo;
    public $set;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        if (!session('?admin')){
            $this->redirect('login/login');
        }
        $this->limit = new Limit();
        $this->role  = new \app\common\model\Role();
        $this->set  = new \app\common\model\Set();
        $this->adminInfo = session('admin');
        $this->navigation();
    }
    /**
     * 导航
     */
    public function navigation(){
        $controller  = request()->controller();
        $action  = request()->action();
        $info = $this->limit->where('controller',$controller)->where('action',$action)->find();
        $this->assign('title',$info['limit_name']);
        if ($this->adminInfo['role_id'] == 1){
            //总管理员拥有总权限
            $list = $this->limit->where('display',1)->order('sort ASC')->select();
        }else{
            $role = $this->role->where('role_id',$this->adminInfo['role_id'])->find();
            $roleArr = empty(json_decode($role['role_auth'],true))?[]:json_decode($role['role_auth'],true);
            if ($info && $role && !in_array($info['limit_id'],$roleArr)){
                $url = '/admin/index/index';
                //无权访问 查找有权限的第一个页面
                $limit_info  =   $this->limit->whereIn('limit_id',$roleArr)
                    ->where('parent_id',0)
                    ->where('display',1)
                    ->find();
                if ($limit_info){
                    $url_info  =   $this->limit
                        ->where('parent_id',$limit_info['limit_id'])
                        ->where('display',1)
                        ->order('sort asc')
                        ->find();
                    if ($url_info){
                        $url = '/'.$url_info['module'].'/'.$url_info['controller'].'/'.$url_info['action'];
                    }

                }
                 no_access($url,3);
            }
            $list = $this->limit->where('limit_id','in',$roleArr)->where('display',1)->order('sort ASC')->select();
        }
        $navList = tree($list);

        $this->assign('navBaseList',$navList);
    }
    /**
     * 图片上传
     */
    public function upload(){
        $data = request()->file('file');

        $info = $data->validate(['size'=>2097152,'ext'=>'jpg,png,gif'])->move( './public/uploads'); //默认上传文件大小为2m
        if ($info){
            $path = '/public/uploads/'.str_replace("\\","/",$info->getSaveName());
            return ['code'=>200,'msg'=>'上传成功','src'=>$path];
        }
        return ['code'=>100,'msg'=>$data->getError()];
    }
    /**
     * tinymce 富文本文件上传
     */
    public function uploadImg(){
        $data = request()->file('edit');
        $info = $data->validate(['size'=>2097152,'ext'=>'jpg,png,gif'])->move( './public/uploads'); //默认上传文件大小为2m
        if ($info){
            $path = '/public/uploads/'.str_replace("\\","/",$info->getSaveName());
            return ['code'=>0,'msg'=>'上传成功','data'=>[
                ['id' => $path],
            ]];
        }
        return ['code'=>100,'msg'=>$data->getError()];

    }
}