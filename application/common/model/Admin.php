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
}
