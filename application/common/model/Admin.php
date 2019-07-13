<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;




class Admin extends Model
{
    //
    use SoftDelete;

    public function login($data){

        $validate = new \app\common\validate\Admin();

        if((!$validate->scene('login')->check($data))){
            return $validate->getError();
        }

        $result = $this->where($data)->find();

        if($result){
            if($result['status'] != 1){
                return '此贴被禁用';
            }
            $sessionDate = [
                'id' => $result['id'],
                'nick' => $result['nick'],
                'is_super' => $result['is_super']
            ];
            session('admin',$sessionDate);
            return 1;
        }else {
            return '用户名和密码错误';
        }
    }

    public function register($data){


        $validate = new \app\common\validate\Admin();
        if((!$validate->scene('register')->check($data))){
            return $validate->getError();
        }


        $return = $this->allowField(true)->save($data);
        if($return){
                return 1;
            }else{
                return "注册失败";
        }






    }

    public function send($data){

        $validate = new \app\common\validate\Admin();
        if(!$validate->scene('send')->check($data)){
            return $validate->getError();
        }

        $return = $this -> where('email',$data['email'])->find();
        if($return){

            return 1;
        }else{
            return '无此邮箱';
        }
    }

    public function reset($data){
//        $validate = new \app\common\validate\Admin();
//        if(!$validate->scene('code')->check($data)){
//            return $validate->getError();
//        }
        $newPassword = mt_rand(10000,99999);
        $memberInfo = $this->where('email',$data['email'])->find();
        $memberInfo->password = $newPassword;
        $result = $memberInfo->save();
        if($result){
            mail_to($data['email'],'密码重置成功','用户名'.$memberInfo['username'].'<br>'.'新密码'.$newPassword);
            return 1;
        }else{
            return "重置失败";
        }

    }

    public function add($data){
        $validate = new \app\common\validate\Admin();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }

        $adminInfo = $this->allowField(true)->save($data);
        if($adminInfo){
            return 1;
        }else{
            return "添加失败";
        }

        return view();
    }
    public function edit($data){
        $validate = new \app\common\validate\Admin();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }

        $adminInfo = $this->find($data['id']);
        if($adminInfo['password'] != $data['oldpass']){
            return  '密码不正确！';
        }
        $adminInfo['password'] = $data['newpass'];
        $adminInfo['nick'] = $data['nick'];
        $adminInfo['email'] = $data['email'];
        $result = $adminInfo->save();
        if($result){
            return 1;
        }else{
            return "修改失败";
        }


    }

}
