<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 9:28
 */

namespace app\common\model;


use think\Model;

class Tags extends BaseModel
{
    public function getTagsById($id){
        $data = [
            'id' => $id
        ];
        $order = [
            'id' => 'desc'
        ];
        $result = $this->where($data)->order($order)->select();

        return $result;
    }

    public function getTagsList(){
        $data = [
            'status' => ['neq',-1]
        ];

        $result = $this->where($data)->select();
        return $result;
    }

    public function articles(){
        return $this->hasMany('Article','tags_id','id');
    }

    public function getTagsArticle(){
        $data = [
            'status' => ['neq',-1]
        ];

        $result = self::with(['articles'])->where($data)->select();
        return $result;
    }

}