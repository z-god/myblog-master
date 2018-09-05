<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 10:46
 */

namespace app\common\model;


use think\Model;

class Img extends BaseModel
{
    public function getImgByStatus(){
        $data=[
            'status'=>['neq',-1]
        ];
        return $this->where($data)->select();
    }

    public function images(){
        return $this->hasMany('Article','img_id','id');
    }

    public function getImagesList(){
        $data = [
            'status' => ['neq',-1]
        ];

        $result =self::with(['images'])->where($data)->select();
        return $result;
    }
}