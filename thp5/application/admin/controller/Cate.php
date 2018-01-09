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

class Cate extends Controller
{
    public function lst()
    {
        $cateres = \think\Db::name('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }
    public function add()
    {
        if (request()->isPost()){
            $data= [
                'catename'=> input('catename'),
                'keyword'=> input('keyword'),
                'desc'=> input('desc'),
                'type'=> input('type')?input('type'):0,
            ];
            $validate = Loader::validate('Cate');
            if ($validate->check($data)){
                $db = \think\Db::name('cate')->insert($data);
                if ($db){
                    return $this->success('添加栏目成功!','lst');
                }else{
                    return $this->error('添加栏目失败！');
                }
            }else{
                return $this->error($validate->getError());
            }

            return;
        }
        return $this->fetch();
    }

    public function del(){
        $id = input('id');
        if (db('cate')->delete($id)){
            return $this->success('删除栏目成功!','cate/lst');
        }else{
            return $this->error('删除栏目失败！');
        }
    }

    public function edit(){
        if (request()->isPost()){
            $data = [
              'id'=>input('id'),
                'catename'=>input('catename'),
                'keyword'=>input('keyword'),
                'desc'=>input('desc'),
                'type'=>input('type'),
            ];
            $validate = Loader::validate('Cate');
            if ($validate->scene('edit')->check($data)){
                if ($db = \think\Db::name('cate')->update($data)){
                    return $this->success('修改栏目成功！','lst');
                }else{
                    return $this->error('修改栏目失败！');
                }
            }else{
                return $this->error($validate->getError());
            }
            return;
        }

        $id = input('id');
        $cates = db('cate')->where('id',$id)->find();
        $this->assign('cates',$cates);
        return $this->fetch();
    }
}

