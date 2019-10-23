<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/17
 * Time: 15:15
 */

namespace app\admin\controller;

use think\App;
use think\Controller;
use app\common\model\Admin;
use think\captcha\Captcha;
class Login extends Controller
{
    protected $admin;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->admin = new Admin();
    }
    public function login(){

        return $this->fetch();
    }

    /**
     * @return mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     * 检测登录
     */
    public function checkLogin(){
        $data = request()->param();
        $captcha = new Captcha();
        if( !$captcha->check($data['captcha'])) {
            return adminMsg(1);
        }
        $check = $this->Validate($data,'User');
        if ($check != true){
            return adminMsg(1,'',$check);
        }
        $user = $this->admin->where('admin_account',$data['admin_account'])->find();
        if (!$user){
            return adminMsg(3);
        }
        if ($user['admin_password'] != md5($data['admin_password'])){
            return adminMsg(4);
        }
        $ip = request()->ip();
        $time = time();
        $this->admin->where('admin_id',$user['admin_id'])->update(['admin_endtime'=>$time,'admin_ip'=>$ip]);
        session('admin',$user);

        return adminMsg(5);
    }
    /**
     * 退出登录
     */
    public function loginOut(){
        session('admin',null);
        if (session('?admin')){
            return adminMsg(8);
        }
        return adminMsg(7);
    }
    /**
     * 修改密码
     */
    public function updatePassword(){
        $data = request()->param();
        if($data['newPassword'] !== $data['rePassword']){
            return adminMsg(11);
        }
        $user = $this->admin->where('admin_id',session('admin.admin_id'))->where('admin_password',md5($data['oldPassword']))->find();
        if (!$user){
            return adminMsg(12);
        }
        $res = $this->admin->where('admin_id',session('admin.admin_id'))->update(['admin_password'=>md5($data['newPassword'])]);
        if ($res){
            session('admin',null);
            return adminMsg(9);
        }
        return adminMsg(10);
    }
}