<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 10:53
 */

namespace app\api\controller;


use app\lib\exception\MissException;

class Img extends Base
{
    public function getImages(){
        $ret = model('Img')->getImgByStatus();
        if (!$ret) {
            throw new MissException([
                'msg' => '请求img不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }
}