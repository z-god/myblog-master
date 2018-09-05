<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 11:10
 */

namespace app\common\model;


use think\Model;

class Webdata extends BaseModel
{
    public function getTotalData($id = 1){
        $data = [
            'id' => $id
        ];
        $result = $this->where($data)->select();
        return $result;

    }

}