<?php

namespace app\home\controller;

use app\common\controller\Home;

class Index extends Home
{
    public $NoLogin = ['*'];

    public function __construct()
    {

        // 调用父类的构造
        parent::__construct();

        $this->BussinessModel = model('common/Business/Business');
        $this->SourceModel = model('common/Business/Source');
    }

    // 主页
    public function index()
    {
        //模板渲染显示
        return $this->view->fetch();
    }

    // 登录
    public function login()
    {
        if ($this->request->isPost()) {
            $mobile = $this->request->param('mobile', '', 'trim');
            $password = $this->request->param('password', '', 'trim');
            if (empty($mobile)) {
                $this->error('请填写手机号');
                exit;
            }
            if (empty($password)) {
                $this->error('请填写密码');
                exit;
            }
            $resl = $this->BussinessModel->where(['mobile' => $mobile])->find();

            if ($resl) {
                $salt = $resl['salt'];
                $password = md5($password . $salt);
                if ($resl['password'] != $password) {
                    $this->error('密码不正确');
                    exit;
                }
                cookie('busid', $resl['id']);
                cookie('mobile', $resl['mobile']);
                $this->success('登录成功', url('home/business/index'));
                exit;
            } else {
                $salt = build_randstr();
                $password = md5($password . $salt);
                $sourceid = $this->SourceModel->where(['name' => ['LIKE', "%云课堂%"]])->value('id');
                $pata = [
                    'mobile' => $mobile,
                    'nickname' => build_encrypt($mobile),
                    'password' => $password,
                    'salt' => $salt,
                    'gender' => 0,
                    'sourceid' => $sourceid,
                    'deal' => '0',
                    'money' => '0',
                    'auth' => '0',
                ];
                // $result = $User->validate('Member')->save($data);    
                // 调用验证器 
                $result = $this->BussinessModel->validate('common/Business/Business')->save($pata);
                if (false === $result) {
                    // 验证失败 输出错误信息
                    $this->error($this->BussinessModel->getError());
                    exit;
                }
                cookie('busid', $resl['id']);
                cookie('mobile', $resl['mobile']);
                $this->success('注册成功', url('home/business/index'));
                exit;
            }
        }

        return $this->view->fetch();
    }
    // 退出
    public function outlogin()
    {
        cookie(null, 'fa_');
        $this->redirect(url('home/index/login'));
    }
}
