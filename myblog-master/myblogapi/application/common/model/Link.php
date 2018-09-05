<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 10:31
 */

namespace app\common\model;


use think\Model;

class Link extends BaseModel
{
    public function getLinkList(){
        $data= [
            'status'=>['neq',-1]
        ];

        $result = $this->where($data)->select();

        return $result;
    }

}