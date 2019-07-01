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
                 $this->success('登录成功','admin/index/login');
            }else {
                  $this->error($return);
            }
        }


        return view();
    }

    //register

    public function register(){

        if(request()->isAjax()){
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'compass' => input('post.compass'),
                'nick' => input('post.nick'),
                'email' => input('post.email')
            ];

            $result = model('Admin')->register($data);

            if($result ==1 ){
                mail_to($data['email'], '注册成功', '注册成功');
                $this->success("注册成功","admin/index/login");
            }else{
                $this->error($result);
            }






        }
        return view();
    }


}
