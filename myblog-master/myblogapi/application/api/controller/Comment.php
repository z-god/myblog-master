<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 10:14
 */

namespace app\api\controller;


use think\Controller;
use app\lib\exception\MissException;

class Comment extends Base
{
    public function getComments(){
        $ret = model('Comment')->getCommentsByStatus();
        if (!$ret) {
            throw new MissException([
                'msg' => '请求comment不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }

    public function updateByStatus($id){
        $status = ['status'=>1];
        $res = model('Comment')->updateById($status,$id);
        if ($res) {
            $this->success('审核成功');
        } else {
            $this->error('审核失败');
        }
    }
    public function deleteByStatus($id){
        $status = ['status'=>2];
        $res = model('Comment')->updateById($status,$id);
        if ($res) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
    public function checkByStatus($id){
        $status = ['status'=>0];
        $res = model('Comment')->updateById($status,$id);
        if ($res) {
            $this->success('审核成功');
        } else {
            $this->error('审核失败');
        }
    }

}