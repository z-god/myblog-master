<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/16
 * Time: 17:30
 */

namespace app\api\controller;


use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        $this->cross();
    }

    public function cross(){
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Headers:X-Requested-With,accept, origin, content-type');
        header("Access-Control-Allow-Methods:PUT,POST,GET,DELETE,OPTIONS");
    }

    public function status() {
        // 获取值
        $data = request()->put();

        // 获取控制器
        $model = request()->controller();
        //echo $model;exit;
        $res = model($model)->save(['status'=>$data['status']]);
        if($res) {
            $this->success('更新成功');
        }else {
            $this->error('更新失败');
        }
    }
}