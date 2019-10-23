<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/27
 * Time: 18:11
 */

namespace app\index\controller;


use think\App;
use think\Controller;
class Base extends Controller
{
    public function __construct(App $app = null)
    {
        parent::__construct($app);

    }

}