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

    //forget
    public function forget(){

        if(request()->isAjax()){
            $data = [
                'email' => input('post.email')
            ];

            $result = model('Admin')->send($data);
            if($result == 1){
                $code = mt_rand(1000,9999);
                session('code',$code);

                mail_to(input('post.email'),'验证码',$code);
                $this->success('发送成功','admin/index/reset');
            }else{
                $this->error($result);
            }
        }


        return view();
    }




    public function reset(){
        if(request()->isAjax()){
            $data = [
                'code' => input('post.code'),
                'email' => input('post.email')
            ];
            if(session('code') != input('post.code') ){
                $this->error("验证码错误");
            }

            $result = model("Admin")->reset($data);
            if($result){
                $this->success("恭喜您密码重置成功，请去邮箱查看新密码！",'admin/index/login');
            }else{
                $this->error($result);
            }
        }

        return view();
    }
}
