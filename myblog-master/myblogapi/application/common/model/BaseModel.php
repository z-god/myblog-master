<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/23
 * Time: 9:55
 */

namespace app\common\model;


use think\Model;

class BaseModel extends Model
{
    public function add($data){
        $data['status'] = 0;
        $this->save($data);
        return $this->id;
    }
    public function updateById($data, $id) {
        return $this->allowField(true)->save($data, ['id'=>$id]);
    }

//    public function save($data){
//        $data['status'] = 0;
//        $this->save($data);
//        return $this->id;
//    }
}