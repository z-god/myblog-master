<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 11:13
 */

namespace app\api\controller;


use think\Controller;
use app\lib\exception\MissException;

class total extends Base
{
    public function getTotalWebData(){
        $ret = model('Webdata')->getTotalData();
        if (!$ret) {
            throw new MissException([
                'msg' => '请求data不存在',
                'errorCode' => 40000
            ]);
        }
        return $ret;
    }

}