<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/24
 * Time: 16:41
 */

namespace app\admin\controller;

use app\admin\controller\Base;
use think\App;
use app\common\model\Set as setModel;
class Set extends Base
{

    public $set;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->set = new setModel();
    }
    public function setInfo(){
        if (request()->isPost()){
            $data = request()->param();
            unset($data['file']);
            $re = $this->set->edit(['site_id'=>1],$data);
            if ($re){
                return adminMsg(13);
            }
            return adminMsg(14);
        }
        $info = $this->set->getInfo();
        $this->assign('info',$info);

        return $this->fetch();
    }
}