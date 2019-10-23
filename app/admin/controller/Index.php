<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/17
 * Time: 15:11
 */
namespace app\admin\controller;

use app\admin\controller\Base;
use think\App;
use think\facade\Env;
class Index extends Base
{
    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }

    public function index(){
        $version = [
            'apache' => Apache_get_version(),
            'tp' => \think\Facade\App::version(),
            'url' => request()->domain(),
            'php' => phpversion(),
            'os' => PHP_OS,
        ];
        return $this->fetch('',['version'=>$version]);
    }
    /**
     * 清除runtime文件
     */
    public function clearCache(){
        deldir(Env::get('runtime_path'));
        return adminMsg(9);
    }

}