<?php

namespace app\common\model\Business;

use think\Model;

class Source extends Model
{
    //模型对应的是哪张表
    protected $name = "business_source";
    // 忽略数据表不存在的字段
    protected $field = true;
}
