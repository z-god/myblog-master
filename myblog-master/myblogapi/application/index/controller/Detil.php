<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/9/5
 * Time: 15:39
 */

namespace app\index\controller;


use think\Controller;

class Detil extends Controller
{
    public function index($id){
        $detils = model('Article')->get($id);
        $this->assign('detils',$detils);
        return view();
    }

}