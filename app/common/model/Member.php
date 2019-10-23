<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/28
 * Time: 16:23
 */

namespace app\common\model;

use think\Model;
class Member extends Model
{
    public function addMember($data){
        $arr['member_head'] = $data['avatarUrl'];
        $arr['member_openid'] = $data['openId'];
        $arr['member_nickname'] = $data['nickName'];
        $arr['member_gender'] = $data['gender'];
        $arr['member_county'] = $data['county'];
        $arr['member_province'] = $data['province'];
        $arr['member_city'] = $data['city'];
        $arr['member_language'] = $data['language'];
        $arr['addtime'] = time();
        $arr['user_unionid'] =  empty($data['unionId'])?'':$data['unionId'];

        return $this->insertGetId($arr);
    }
}