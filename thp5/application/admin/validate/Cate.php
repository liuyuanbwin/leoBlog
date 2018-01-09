<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 12:39
 */
namespace app\admin\validate;

use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'catename'  =>  'require|max:25|unique:cate',
        'keyword' => 'require',
    ];

    protected $message  =   [
        'catename.require' => '名称不能为空！',
        'catename.unique' => '栏目名称不能重复',
        'catename.max' => '栏目名称长度不能大于10位，',
        'keyword.require' => '栏目关键字不能为空！',
    ];

    protected $scene = [
        'edit' => ['catename'=>'require|unique:cate'],
    ];
}