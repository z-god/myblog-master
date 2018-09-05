<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/9/4
 * Time: 15:25
 */

namespace app\api\controller;


class Music extends Base
{
    public function getMusic(){
        $ret = model('Music')->select();
        return $ret;
    }
}