<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Business extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        return $this->view->fetch();
    }
}
