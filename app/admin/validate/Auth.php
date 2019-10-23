<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/21
 * Time: 9:24
 */

namespace app\admin\validate;


use think\Validate;

class Auth extends Validate
{
    /*
     * @var array 验证规则
     */
    protected $rule = [
        'limit_name' => 'require',
        'limit_id' => 'require|number',
        'module' => 'require',
        'controller' => 'require',
        'admin_account' => 'require',
        'admin_password' => 'require',
        'admin_id' => 'require',
        'role_id' => 'require',
        'role_name' => 'require',
    ];
    /*
     * @var array 错误消息
     */
    protected $message = [
        'limit_name.require' => '导航名称必填',
        'limit_id.require' => '参数有误',
        'limit_id.number' => '参数有误',
        'module.require' => '模块名必填',
        'controller.require' => '控制器名必填',
        'admin_account.require' => '账号必填',
        'admin_password.require' => '密码必填',
        'admin_id.require' => '参数有误',
        'role_id.require' => '参数有误',
        'role_name.require' => '角色名称必填',
    ];
    /**
     * @var array 应用场景
     */
    protected $scene = [
        'addNav' => ['limit_name','module','controller'],
        'editNav' => ['limit_id','limit_name','module','controller'],
        'delNav' => ['limit_id'],
        'addAdmin' => ['admin_account','admin_password'],
        'editAdmin' => ['admin_id','admin_account'],
        'delAdmin' => ['admin_id'],
        'delRole' => ['role_id'],
        'addRole' => ['role_name'],
        'editRole' => ['role_name,role_id'],
    ];
}