<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/10/23
 * Time: 10:57
 */

namespace app\admin\controller;


use think\App;

class Member extends Base
{
    protected $member;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->member = new \app\common\model\Member();
    }
    /*
     * 会员列表
     */
    public function memberList(){

        return $this->fetch();
    }
    /*
     * 会员列表接口
     */
    public function apiMemberList(){
        $page = request()->param('page',1);
        $limit = request()->param('limit',10);
        $content = request()->param('content');
        $where = [];
        if (!empty($content)){
            $where[] = ['member_nickname|member_tel','like',"%$content%"];
        }
        $list = $this->member->where($where)->page($page)->limit($limit)->select();
        $count = $this->member->where($where)->count();

        return api($list,$count);
    }
    /*
     * 会员详情
     */
    public function memberInfo(){
        $id = request()->param('member_id');
        $info = $this->member->where('member_id',$id)->find();

        return $this->fetch('',['info'=>$info]);
    }
    /**
     * 删除会员
     */
    public function delMember(){
        $id = request()->param('member_id');
        $re = $this->member->where('member_id',$id)->delete();
        if ($re){
            return adminMsg(15);
        }
        return adminMsg(16);
    }
}