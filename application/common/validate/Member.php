<?php

namespace app\common\validate;

use think\Validate;

class Member extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'username|会员名称' => 'require|unique:member',
        'password|密码' => 'require',
        'pldword|旧密码' => 'require',
        'pnword|新密码' => 'require',
        'nickname|昵称' => 'require',
        'email|邮箱' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];

    public function sceneAdd(){
        $this->only(['username','password','nickname','email']);
    }

    public function sceneEdit(){
        $this->only(['pldword','pnword','nickname']);
    }
}
