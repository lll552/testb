<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Member extends Model
{
    //
    use SoftDelete;

    public function comments(){
        return $this->hasMany('Comment','member_id','id');
    }
    public function add($data){

        $validate =new \app\common\validate\Member();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }

        $result = $this->allowField(true)->save($data);
        if($result){
            return 1;
        }else {
            return '添加会员失败';
        }

    }

    public function edit($data){
        $validate = new \app\common\validate\Member();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }
        $memberInfo = $this->find($data['id']);
        if($memberInfo['password'] != $data['pldword']){
            return '密码错误';
        }
        $memberInfo['password'] = $data['pnword'];
        $memberInfo['nickname'] = $data['nickname'];
        $return = $memberInfo->save();
        if($return){
            return 1;
        }else{
            return '修改失败';
        }
    }

    public function register($data){
        $validate = new \app\common\validate\Member();
        if(!$validate->scene('register')->check($data)){
            return $validate->getError();
        }

        $return = $this->allowField(true)->save($data);
        if($return){
            return 1;
        }else{
            return '注册失败';
        }

        return view();
    }

    public function login($data){
        $validate = new \app\common\validate\Member();
        if(!$validate->scene('login')->check($data)){
            return $validate->getError();
        }
        unset($data['verify']);
        $return = $this->where($data)->find();
        if($return){
            $sessionData = [
                'id' => $return['id'],
                'nickname' => $return['nickname']
            ];
            session('index',$sessionData);
            return 1;
        }else{
            return '登录操失败';
        }

        return view();
    }
}
