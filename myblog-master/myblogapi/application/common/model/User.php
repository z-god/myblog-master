<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/15
 * Time: 9:55
 */

namespace app\common\model;
use think\Model;

class User extends BaseModel
{
    public function getUser(){
        $data = [
            'status'=>['neq',-1]
        ];
        return $this->where($data)->select();
    }
    public function updateById($data, $id) {
        // allowField 过滤data数组中非数据表中的数据
        return $this->allowField(true)->save($data, ['id'=>$id]);
    }

}