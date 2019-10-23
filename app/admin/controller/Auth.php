<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/20
 * Time: 14:15
 */

namespace app\admin\controller;


use think\App;
use app\common\model\Limit;
use app\common\model\Admin;
use app\common\model\role;
use app\admin\controller\Base;
class Auth extends Base
{
    public $limit;
    public $admin;
    public $role;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->limit = new Limit();
        $this->admin = new Admin();
        $this->role = new Role();
    }

    /**
     * 管理员列表
     */
    public function adminList(){

        return $this->fetch();
    }
    /**
     * 管理员列表接口
     */
    public function apiAdminList(){
        $content = request()->param('content');
        $page = request()->param('page',1);
        $limit = request()->param('limit',10);
        $where = [];
        if (!empty($content)){
            $where[] = ['admin_account','like',"%$content%"];
        }
        $list = $this->admin->getList($where,'',$page,$limit);
        $count = $this->admin->where($where)->count();

        return api($list,$count);

    }
    /**
     * 添加管理员
     */
    public function addAdmin(){
        if (request()->isPost()){
            $data = request()->post();
            $check = $this->validate($data,'app\admin\validate\Auth.addAdmin');
            if ($check !== true){
                return adminMsg(1,'',$check);
            }
            $data['admin_password'] = md5($data['admin_password']);
            $data['admin_addtime'] = time();
            $re = $this->admin->add($data);
            if ($re){
                return adminMsg(9);
            }
            return adminMsg(10);
        }
        //角色列表
        $roleList = $this->role->getList();
        $this->assign('roleList',$roleList);

        return $this->fetch();
    }
    /**
     * 编辑管理员
     */
    public function editAdmin(){
        if (request()->isPost()){
            $data = request()->post();
            $check = $this->validate($data,'app\admin\validate\Auth.editAdmin');
            if ($check !== true){
                return adminMsg(1,'',$check);
            }
            $re = $this->admin->edit(['admin_id'=>$data['admin_id']],$data);
            if ($re){
                return adminMsg(13);
            }
            return adminMsg(14);
        }
        //角色列表
        $id =  request()->get('admin_id');
        $info = $this->admin->getInfo(['admin_id'=>$id]);
        $this->assign('info',$info);
        $roleList = $this->role->getList();
        $this->assign('roleList',$roleList);

        return $this->fetch('add_admin');
    }
    /**
     * 密码重置
     */
    public function rePassword(){
        $id = request()->get();
        $pwd = md5('123456');
        $re = $this->admin->edit($id,['admin_password'=>$pwd]);
        if ($re){
            return adminMsg(9);
        }
        return adminMsg(10);
    }
    /**
     * 删除管理员
     */
    public function delAdmin(){
        $id = request()->get();
        $check = $this->validate($id,'app\admin\validate\Auth.delAdmin');
        if ($check !== true){
            return adminMsg(1,'',$check);
        }
        $re = $this->admin->del($id);
        if ($re){
            return adminMsg(15);
        }
        return adminMsg(16);
    }
    /**
     * 角色列表
     */
    public function roleList(){

        return $this->fetch();
    }
    /**
     * 角色列表接口
     */
    public function apiRoleList(){
        $content = request()->param('content');
        $page = request()->param('page',1);
        $limit = request()->param('limit',10);
        $where = [];
        if (!empty($content)){
            $where[] = ['role_name','like',"%$content%"];
        }
        $list = $this->role->getList($where,'',$page,$limit);
        $count = $this->role->where($where)->count();

        return api($list,$count);
    }
    /**
     * 添加角色
     */
    public function addRole(){
        if (request()->isPost()){
            $data = request()->param();
            $msg = $this->validate($data,'app\admin\validate\Auth.addRole');
            if ($msg !== true){
                return adminMsg(1,'',$msg);
            }
            if (!empty($data['role_auth'])){
                $data['role_auth'] = json_encode($data['role_auth']);
            }else {
                return adminMsg(0);
            }
            $data['role_addtime'] = time();
            $re = $this->role->add($data);
            if ($re){
                return adminMsg(9);
            }
            return adminMsg(10);
        }

        return $this->fetch();
    }
    /**
     * 编辑角色
     */
    public function editRole(){
        if (request()->isPost()){
            $data = request()->param();
            $msg = $this->validate($data,'app\admin\validate\Auth.editRole');
            if ($msg !== true){
                return adminMsg(1,'',$msg);
            }
            if (!empty($data['role_auth'])){
                $data['role_auth'] = json_encode($data['role_auth']);
            }else {
                return adminMsg(0);
            }
            $re = $this->role->edit(['role_id'=>$data['role_id']],$data);
            if ($re){
                return adminMsg(13);
            }
            return adminMsg(14);

        }
        $id = request()->get();
        $info = $this->role->getInfo($id);
        $this->assign('info',$info);
        return $this->fetch('auth/add_role');
    }
    /**
     * 获取权限列表
     */
    public function getNav(){
        $id = request()->param('role_id');
        if (!empty($id)){
            $where['role_id'] = $id;
            $roleInfo = $this->role->getInfo($where);
            $roleArr = json_decode($roleInfo['role_auth'],true);
        }else{
            $roleArr = [];
        }
        $list = $this->limit->order('sort ASC')->select();
        $arr = [];
        if (!empty($roleArr)){
            foreach ($list as $item) {
                if (in_array($item['limit_id'],$roleArr)){
                    $arr[] = $item['limit_id'];
                }
            }
        }

        return json(['nav'=>$list,'checkedId'=>$arr]);
    }
    /**
     * 删除角色
     */
    public function delRole(){
        $id = request()->get();
        $check = $this->validate($id,'app\admin\validate\Auth.delRole');
        if ($check !== true){
            return adminMsg(1,'',$check);
        }
        $re = $this->role->del($id);
        if ($re){
            return adminMsg(15);
        }
        return adminMsg(16);
    }
    /**
     * 导航列表
     */
    public function navList(){
        $list = $this->limit->order('sort ASC')->select();
        $navList = tree($list);
        $this->assign('navList',$navList);

        return $this->fetch();
    }
    /**
     * 权限列表接口
     */
    public function apiNavList(){
        $list = $this->limit->order('sort ASC')->select();
        return json($list);
    }
    /**
     * 编辑导航
     */
    public function editNav(){
        if (request()->isPost()){
            $data = request()->param();
            $msg = $this->validate($data,'app\admin\validate\Auth.editNav');
            if ($msg !== true){
                return adminMsg(1,'',$msg);
            }
            $re = $this->limit->edit(['limit_id'=>$data['limit_id']],$data);

            if ($re){
                return adminMsg(13);
            }
            return adminMsg(14);
        }
        $id = request()->get('limit_id');
        $info = $this->limit->where('limit_id',$id)->find();
        $this->assign('info',$info);
        //导航分类
        $navList = $this->limit->where('parent_id',0)->order('sort ASC')->select();
        $this->assign('navList',$navList);

        return $this->fetch();
    }
    /**
     * 添加导航选择分类接口
     */
    public function apiAddNav(){
        $list = $this->limit->order('sort ASC')->select();
        $navList = tree($list);
        return json($navList);
    }
    /**
     * 添加导航
     */
    public function addNav(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->validate($data,'app\admin\validate\Auth.addNav');
            if ($check !== true){
                return adminMsg(1,'',$check);
            }
            $re = $this->limit->add($data);

            if ($re){
                return adminMsg(9);
            }
            return adminMsg(10);
        }
        //导航分类
        $navList = $this->limit->getList(['parent_id'=>0]);
        $this->assign('navList',$navList);

        return $this->fetch('edit_nav');
    }
    /**
     * 删除导航
     */
    public function delNav(){
        $id = request()->get();
        $check = $this->validate($id,'app\admin\validate\Auth.delNav');
        if ($check !== true){
            return adminMsg(1,'',$check);
        }
        $re = $this->limit->del($id);
        if ($re){
            return adminmsg(15);
        }
        return adminmsg(16);
    }
}