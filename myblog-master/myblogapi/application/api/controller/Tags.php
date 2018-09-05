<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 9:32
 */

namespace app\api\controller;


use think\Controller;
use app\lib\exception\MissException;

class Tags extends Base
{
    public function getTags(){
        $ret = model('Tags')->getTagsArticle();
        if(!$ret){
            throw new MissException([
                'msg' => '请求tag不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }

    public function getTagsList(){
        $ret = model('Tags')->getTagsList();
        if(!$ret){
            throw new MissException([
                'msg' => '请求tag不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }

    public function getTagsById($id){
        $ret = model('Tags')->getTagsById($id);
        if(!$ret){
            throw new MissException([
                'msg' => '请求tag不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }

}