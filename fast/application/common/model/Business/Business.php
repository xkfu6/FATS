<?php

namespace app\common\model\BUsiness;

use think\Model;

/**
 * 客户模型
 */
class Business extends Model
{

    //模型对应的是哪张表
    protected $name = "business";
    // 忽略数据表不存在的字段
    protected $field = true;
    //开启自动写入
    protected $autoWriteTimestamp = true;

    //插入的时候设置的字段名
    protected $createTime = "createtime";

    //禁止写入时间字段
    protected $updateTime = false;

    // 软删除的字段
    protected $deleteTime = false;

    // 最加一个虚拟字段
    protected $append = [
        'avatar_text',
        'avatar_province',
        'avatar_city',
        'avatar_district'
    ];
    /**
     * 给虚拟字段构建方法
     * @param data $value 当前字段的数据值
     * @param data $data 是一整条的数据结果
     * @return *
     */
    public function getAvatarTextAttr($value, $data)
    {
        $default = trim(config('site.cover'), '/'); //系统上传的默认图
        // var_dump($value); //NULL
        // var_dump($data); // []
        //先获取到头像字段
        $avatar = isset($data['avatar']) ? trim($data['avatar']) : '';
        $avatar = trim($avatar, '/');

        // //为空 或者 不存在
        if (empty($avatar) || !is_file($avatar)) {
            $avatar = $default; //给一张默认图
        }

        $avatar = request()->domain() . '/' . $avatar;

        return $avatar;
    }
    public function getAvatarProvince($value, $data) {
        
    }
}
