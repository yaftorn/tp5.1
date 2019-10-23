<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/18
 * Time: 18:23
 */
namespace app\admin\validate;


use think\Validate;

class User extends Validate
{
    protected $rule = [
        'admin_account' => 'require',
        'admin_password' => 'require',
    ];
    protected $message = [
        'admin_account.require'=>'账号必填',
        'admin_password.require'=>'密码必填',
    ];

}