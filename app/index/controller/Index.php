<?php
namespace app\index\controller;

class Index extends Base
{
    public function index()
    {
        echo 1;
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
