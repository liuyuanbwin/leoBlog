<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 12:39
 */
namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title'  =>  'require|max:100|unique:article',
        'keywords' => 'require',
    ];

    protected $message  =   [
        'title.require' => '标题不能为空！',
        'title.unique' => '标题不能重复',
        'title.max' => '标题长度不能大于100位，',
        'keywords.require' => '关键字不能为空！',
    ];
}