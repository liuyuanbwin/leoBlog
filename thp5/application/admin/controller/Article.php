<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/16
 * Time: 12:39
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Loader;

class Article extends Controller
{
    public function lst()
    {
        $artres =\think\Db::name('article')->alias('a')->join('cate c','c.id = a.cateid','LEFT')->paginate(3);

        $this->assign('artres',$artres);

        return $this->fetch();
    }
    public function add()
    {
        if (request()->isPost()){
            $data = [
                'title'=>input('title'),
                'keywords'=>input('keywords'),
                'desc'=>input('desc'),
                'cateid'=>input('cateid'),
                'content'=>input('content'),

                'time'=>time(),
            ];

            if ($_FILES['pic']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('pic');

                // 移动到框架应用根目录/public/uploads/ 目录下
                if($file){
                    echo
                    $info = $file->move(ROOT_PATH . '/public/' . DS . 'static/uploads');
                    if($info){
                        // 成功上传后 获取上传信息
                        $data['pic']='static/uploads/'.date('Ymd').'/'.$info->getFilename();
                    }else{
                        // 上传失败获取错误信息
                        return $this->error($file->getError());
                    }
                }
            }else{
                echo 222;die;
            }

                $validate = \think\Loader::validate('Article');
                if ($validate->check($data)){
                    $db = \think\Db::name('article')->insert($data);
                    if ($db){
                        return $this->success('添加文章成功!','lst');
                    }else{
                        return $this->error('添加栏目失败！');
                    }
                }else{
                    return $this->error($validate->getError());
                }

            return;
        }

        $cateres = db('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }

    public function edit()
    {
        if (request()->isPost()){
            $data = [
                'title'=>input('title'),
                'keywords'=>input('keywords'),
                'desc'=>input('desc'),
                'cateid'=>input('cateid'),
                'content'=>input('content'),

                'time'=>time(),
            ];

            if ($_FILES['pic']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('pic');

                // 移动到框架应用根目录/public/uploads/ 目录下
                if($file){
                    echo
                    $info = $file->move(ROOT_PATH . '/public/' . DS . 'static/uploads');
                    if($info){
                        // 成功上传后 获取上传信息
                        $data['pic']='static/uploads/'.date('Ymd').'/'.$info->getFilename();
                    }else{
                        // 上传失败获取错误信息
                        return $this->error($file->getError());
                    }
                }
            }else{
                echo 222;die;
            }

            $validate = \think\Loader::validate('Article');
            if ($validate->check($data)){
                $db = \think\Db::name('article')->insert($data);
                if ($db){
                    return $this->success('添加文章成功!','lst');
                }else{
                    return $this->error('添加栏目失败！');
                }
            }else{
                return $this->error($validate->getError());
            }

            return;
        }

        $cateres = db('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }

}

