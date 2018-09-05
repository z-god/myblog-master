<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 10:34
 */

namespace app\api\controller;


use think\Controller;
use app\lib\exception\MissException;

class Link extends Base
{
    public function getLink(){
        $ret = model('Link')->getLinkList();
        if (!$ret) {
            throw new MissException([
                'msg' => '请求link不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }

}