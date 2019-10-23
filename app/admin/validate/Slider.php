<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/25
 * Time: 11:57
 */

namespace app\admin\validate;

use think\Validate;
class Slider extends Validate
{
    protected $role = [
        'type_name' => 'require',
        'type_id' => 'require|number',
        'slider_thumb' => 'require',
        'slider_id' => 'require|number',
    ];
    protected $message = [
        'type_name.require' => '位置名称必填',
        'slider_thumb.require' => '轮播图不能为空',
        'type_id.require' => '参数错误',
        'slider_id.require' => '参数错误',
        'type_id.number' => '参数必须为数字',
        'slider_id.number' => '参数必须为数字',
    ];
    protected $scene = [
        'addType' => ['type_name'],
        'addSlider' => ['slider_thumb'],
        'editType' => ['type_name,type_id'],
        'editSlider' => ['slider_thumb,slider_id'],
        'delType' => ['type_id'],
        'delSlider' => ['slider_id'],
    ];
}