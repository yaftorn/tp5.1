<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/28
 * Time: 10:07
 */
namespace app\wxapi\controller;

use think\App;
use think\Controller;
use app\common\model\Session;
use app\common\model\Member;
class Base extends Controller
{
    public $session;
    public $member;
    public $member_id;
    public $member_info;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->session = new Session();
        $this->member = new Member();
    }
    /**
     * 检测是否登录
     */
    protected function checkLogin(){
      $session_id = request()->param('session_id');
      if (!$session_id){
          return wxApi(199);
      }
      $sessionInfo = $this->session->where(['session_id'=>$session_id])->find();
      $memberInfo = $this->member->where(['openid'=>$sessionInfo['openid']])->find();
      if ($memberInfo){
          $this->member = $memberInfo['member_id'];
          $this->member_info = $memberInfo;
      }else{
          return wxApi(198);
      }

    }
}