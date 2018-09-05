<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/14
 * Time: 15:38
 */

namespace app\common\model;


use think\Model;

class Article extends BaseModel
{
    public function getArticleById($id){
        $article = Article::where('id', '=', $id)
            ->find();
        return $article;
    }

    public function getArticleList($page){
        $data = [
            'status'=>['neq',-1]
        ];

        $order = [
            'id'=>'desc'
        ];

        $result = $this->where($data)->order($order)->paginate(5,false,[
            'type'     => 'Bootstrap',
            'page' => $page,
        ]);

        return $result;
    }

    public function getArticle(){
        $data = [
            'status'=>1
        ];

        $order = [
            'id'=>'desc'
        ];

        $result = $this->where($data)->order($order)->paginate(5);
        return $result;
    }

    public function items()
    {
        return $this->hasMany('Comment', 'article_id', 'id');
    }


    public function getCommentsList($status = 1){
        $data=[
            'status' => $status
        ];
        $result = self::with(['items'])->where($data)->select();

        return $result;
    }


    public function tags(){
        return $this->hasMany('Tags','article_id','id');
    }

    public function getTagsArticle(){
        $data = [
            'status' => ['neq',-1]
        ];

        $result = self::with(['tags'])->where($data)->select();
        return $result;
    }

}