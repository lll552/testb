<?php

namespace app\admin\controller;

use think\Controller;

class Home extends Base
{
    //
    public function index(){
        return view();
    }

    public function  logout(){
        session(null);
        if(session('?admin.id')){
            $this->error('退出错误');
        }else{
            $this->success('退出成功','admin/index/login');
        }
    }
}
