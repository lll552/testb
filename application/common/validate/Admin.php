<?php

namespace app\common\validate;

use think\Validate;

class Admin extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'username|读者姓名' => 'require',
        'password|密码' => 'require',
        'compass|确认密码' => 'require|confirm:password',
        'nick|昵称' => 'require',
        'email' => 'require|email',
        'code|验证码' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [];

    public function sceneLogin()
    {

        return $this->only(['username','password']);
    }


    public function  sceneRegister(){
        return $this->only(['username','password','compass','nick','email'])
            ->append('username','unique:admin');
    }

    public function sceneSend(){
        return $this->only(['email']);
    }

    public function sceneCode(){
        return $this->only(['code']);
    }
}
