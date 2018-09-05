<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 10:05
 */

namespace app\common\model;


use think\Model;

class Comment extends BaseModel
{
    public function getCommentsByStatus(){
        $data = [
            'status'=>['neq',-1]
        ];
        return $this->where($data)->select();
    }
}