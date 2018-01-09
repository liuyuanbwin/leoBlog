<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/24
 * Time: 20:20
 */
namespace app\admin\controller;
use think\Controller;
use think\View;
class Admin extends Controller
{
    public function index()
    {
        $view = new View();
        $view->statu = "已sss登录";
       // $this->assign('statu',"已登录");
       //  return $this->fetch();
        return $view->fetch();
    }
}