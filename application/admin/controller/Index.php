<?php

namespace app\admin\controller;

use think\Controller;
use think\Model;

class Index extends Controller
{
    //
    public function login(){


        if(request()->isAjax()){

            $data = [
                'username' => input('post.username'),
                'password' => input('post.password')
            ];


            $return = model('Admin')->login($data);


            if($return == 1){
                 $this->success('登录成功','admin/home/login');
            }else {
                  $this->error($return);
            }
        }


        return view();
    }

}
