<?php

namespace app\home\controller;

// 前台公共控制器
use app\common\controller\Home;

class Business extends Home
{
    public function __construct()
    {
        parent::__construct();
        $this->BusinessModel = model('common/Business/Business');
    }
    // 我的
    public function index()
    {
        return $this->view->fetch();
    }
    // 联系我们
    public function contact()
    {
        //模板渲染显示
        return $this->view->fetch();
    }
    public function collection()
    {
        return $this->view->fetch();
    }
    // 基本资料
    public function profile()
    {
        return $this->view->fetch();
    }
}
