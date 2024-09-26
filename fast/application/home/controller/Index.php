<?php

namespace app\home\controller;

//让我们自己的控制器去继承Thinkphp的控制器'
//面向对象引入
use \think\Controller; //把TP的底层控制器引入进来

class Index extends Controller
{
    public function __construct()
    {
        // 调用父类的构造
        parent::__construct();
    }
    public function index()
    {
        //模板渲染显示
        return $this->view->fetch();
    }
}
