<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/9/4
 * Time: 16:27
 */

namespace app\index\controller;


use think\Controller;

class Index extends Controller
{
    public function index(){
        $datas = model('Article')->getArticle();

        $musics = model('Music')->paginate('1');
        $urls = model('Link')->select();

        $this->assign('urls', $urls);
        $this->assign('musics', $musics[0]);
        $this->assign('datas', $datas);
        return view();
    }
}