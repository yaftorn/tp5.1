<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/10/18
 * Time: 11:55
 */

namespace app\admin\validate;


use think\Validate;

class Goods extends Validate
{
    protected $message = [
        'category_name' => 'require',
        'category_id' => 'require|number',
        'key_name' => 'require',
        'key_id' => 'require|number',
    ];
    protected $rule = [
        'category_name.require' => '分类名称必填',
        'key_name.require' => '属性名必填',
        'category_id.require' => '参数错误',
        'key_id.require' => '参数错误',
        'category_id.number' => '参数错误',
        'key_id.number' => '参数错误',
    ];
    protected $scene = [
        'addCategory' => ['category_name'],
        'addKey' => ['key_name'],
        'editCategory' => ['category_name','category_id'],
        'editKey' => ['key_name','key_id'],
        'delCategory' => ['category_id'],
        'delKey' => ['key_id'],
    ];
}