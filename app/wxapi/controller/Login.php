<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/28
 * Time: 10:09
 */

namespace app\wxapi\controller;

use think\App;
use app\common\model\Session;
use app\common\model\Member;
use Naixiaoxin\ThinkWechat\Facade;
class Login extends Base
{
    public $session;
    public $member;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->session = new Session();
        $this->member = new Member();
    }

    /**
     * 微信小程序登录
     */
    public function login(){
        $code = $this->request->param('code',111);
        $app = Facade ::miniProgram();
        $res = $app->auth->session($code);
        if (is_array($res)){
            if ($res['errcode'] === 0){
                $openid = $res['openid'];
                $session_key = $res['session_key'];
                $unionid = empty($res['unionid'])?'':$res['unionid'];
                $sessionInfo = $this->session->where(['openid'=>$openid])->find();
                if ($sessionInfo){
                    $session_id = $sessionInfo['session_id'];
                    if ($sessionInfo['oldtime']<time()){
                        //更新session_key
                        $session_id = randStr(32);
                        $res = $this->session->edit(['id'=>$sessionInfo['id']],['session_id'=>$session_id,'session_key'=>$session_key,'oldtime'=>time()+7200]);
                    }
                }else{
                    //添加到session表
                    $data['session_id'] = randStr(32);
                    $data['session_key'] = $session_key;
                    $data['openid'] = $openid;
                    $data['unionid'] = $unionid;
                    $data['addtime'] = time();
                    $data['oldtime'] = time()+7200; //过去时间 session_key 有效期3天
                    $res = $this->session->add($data);
                    $session_id =  $data['session_id'];
                }
                if (!$res){
                    return wxApi(202);
                }
                $memberInfo = $this->member->where(['openid'=>$openid])->find();
                $re['session_id'] = $session_id;
                if ($memberInfo){
                    $re['memberInfo'] = $memberInfo;
                }
                return wxApi(200,$re);
            }
            return wxApi($res['errcode']);
        }
        return wxApi(201);
    }
    /*
     * 注册
     */
    public function register(){
        $encryptedData  =   $this->request->post('encryptedData');
        $iv             =   $this->request->post('iv');
        $session_id     =   $this->request->post('session_id');
        $session_info   =   $this->session->where('session_id',$session_id)->find();
        $memberInfo = $this->member->where(['openid'=>$session_info['openid']])->find();
        if(!empty($memberInfo)){
            return wxApi(200,$memberInfo);
        }

        $app = Facade ::miniProgram();
        $decryptedData = $app->encryptor->decryptData($session_info['session_key'], $iv, $encryptedData);
        $member_id = $this->member->addMember($decryptedData);
        $memberInfo = $this->member->where(['member_id'=>$member_id])->find();
        if ($memberInfo){
            return wxApi(200,$memberInfo);
        }
        return wxApi(203);
    }

}