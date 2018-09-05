<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/15
 * Time: 15:00
 */

namespace app\api\controller;
use think\Controller;
use app\lib\exception\MissException;
use think\Request;

class Article extends Base
{
    public  function getNormalArticle($page){
        $ret = model('Article')->getArticle($page);
        if (!$ret) {
            throw new MissException([
                'msg' => '请求article不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }
    public function getArticle($page)
    {
        $ret = model('Article')->getArticleList($page);
        if (!$ret) {
            throw new MissException([
                'msg' => '请求article不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }

    public function addArticle()
    {
        $data = request()->put();
        $id = model('Article')->add($data);
        if ($id) {
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }
    }

    public function updateStatus($id){
        $status = ['status'=>1];
        $res = model('Article')->updateById($status,$id);
        if ($res) {
            $this->success('审核成功');
        } else {
            $this->error('审核失败');
        }
    }
    public function deleteArticle($id){
        $status = ['status'=>2];
        $res = model('Article')->updateById($status,$id);
        if ($res) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
    public function checkArticle($id){
        $status = ['status'=>0];
        $res = model('Article')->updateById($status,$id);
        if ($res) {
            $this->success('审核成功');
        } else {
            $this->error('审核失败');
        }
    }
}