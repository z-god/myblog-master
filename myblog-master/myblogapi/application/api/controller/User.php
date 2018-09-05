<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/20
 * Time: 13:47
 */

namespace app\api\controller;


class User extends Base
{
    public function getUser(){
        $ret = model('User')->getUser();
        if (!$ret) {
            throw new MissException([
                'msg' => '请求comment不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }

}