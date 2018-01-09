<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 12:11
 */
namespace app\admin\controller;
use \think\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}