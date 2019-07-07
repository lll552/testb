<?php

namespace app\admin\controller;

use think\Controller;

class Admin extends Controller
{
    //
    public function all(){

        $admins = model('Admin')->order('create_time','desc')->paginate(6);
        $viewData = [
            'admins' => $admins
        ];
        $this->assign($viewData);
        return view();
    }
    public function add(){
        if(request()->isAjax()){
            $data = [

                'username' => input('post.username'),
                'password' => input('post.password'),

                'compass' => input('post.compass'),
                'nick' => input('post.nick'),
                'email' => input('post.email')

            ];

            $result = model('Admin')->add($data);
            if($result == 1){
                $this->success('添加成功','admin/admin/all');
            }else{
                $this->error($result);
            }
        }

        $cates = model('cate')->select();
        $viewData = [
            'cates' => $cates
        ];
        $this->assign($viewData);
        return view();

    }

    public function status(){
        if(request()->isAjax()){
            $data = [
                'id' => input('post.id'),
                'status' => input('post.status')? 0 : 1
            ];

            $adminInfo = model('Admin')->find(input('post.id'));
            $adminInfo->status = $data['status'];
            $result = $adminInfo->save();
            if($result){
                $this->success('切换成功！','admin/admin/all');
            }else{
                $this->error($result);
            }
        }
    }



    public function edit(){
        if(request()->isAjax()){
            $data = [
                'id' => input('post.id'),
                'username' => input('post.username'),
                'oldpass' => input('post.oldpass'),

                'newpass' => input('post.newpass'),
                'nick' => input('post.nick'),
                'email' => input('post.email')
             ];
            $result = model('Admin')->edit($data);

            if($result == 1){
                $this->success('修改成功','admin/admin/all');
            }else{
                $this->error($result);
            }


        }
        $admin = model('Admin')->find(input('id'));
        $viewData = [
            'admin' => $admin
        ];
        $this->assign($viewData);
        return view();
    }

    public function del(){
        $adminInfo = model('Admin')->find(input('post.id'));
        $result = $adminInfo->delete();
        if($result){
            $this->success('删除成功','admin/admin/all');
        }else{
            $this->error($result);
        }
    }
}
