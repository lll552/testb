<?php

namespace app\admin\controller;

use think\Controller;

class Member extends Controller
{
    //

    public function all(){

        $members = model('Member')->order('create_time','desc')->paginate(3);
        $viewData = [
            'members' => $members
        ];
        $this->assign($viewData);
        return view();

    }

    public function add(){

        if(request()->isAjax()){
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email')

            ];

            $result = model('Member')->add($data);
            if($result == 1){
                $this->success('添加会员成功','admin/member/all');
            }else {
                $this->error($result);
            }
        }
        return view();
    }

    public function edit(){
        if(request()->isAjax()){
            $data = [
                'id' => input('post.id'),
                'username' => input('post.username'),
                'pldword' => input('post.pldword'),
                'pnword' => input('post.pnword'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email')
            ];

            $result = model('Member')->edit($data);
            if($result ==1 ){
                $this->success('会员信息修改成功','admin/member/all');
            }else{
                $this->error($result);

            }
        }
        $memberInfo = model('Member')->find(input('id'));
        $viewData = [
            'member' => $memberInfo
        ];
        $this->assign($viewData);
        return view();
    }

    public function del(){
        if(request()->isAjax()){

            $memberInfo = model('Member')->with('comments')->find(input('post.id'));
            $result = $memberInfo->together('comments')->delete();
            if($result){
                $this->success('删除成功','admin/member/all');
            }else{
                $this->error($result);
            }
        }
        return view();
    }




}
