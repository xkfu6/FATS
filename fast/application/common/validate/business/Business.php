<?php

namespace app\common\validate\Business;

use think\Validate;

class Business extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'mobile'   => ['require', 'number', 'unique:business', 'regex:/(^1[3|4|5|7|8][0-9]{9}$)/'],
        'money' => ['number', '>=:0'],
        'auth' => ['number', 'in:0,1'],
        'deal' => ['number', 'in:0,1'],
        'nickname' => ['require'],
        'email' => ['email'],
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */
    protected $message = [
        'mobile.require' => '手机号必填',
        'mobile.unique' => '手机号已存在，请重新输入',
        'mobile.regex' => '手机号格式不正确',
        'password.require'  => '密码必填',
        'salt.require'      => '密码盐必填',
        'money.number'      => '余额必须是数字类型',
        'money.>='      => '余额必须大于等于0元',
        'auth.number'      => '认证状态的类型有误',
        'auth.in'      => '认证状态的值有误',
        'deal.number'      => '成交状态的类型有误',
        'deal.in'      => '成交状态的值有误',
        'nickname.require' => '昵称必填',
        'email.require' => '邮箱必填',
        'email.email' => '邮箱格式错误'
    ];
}
