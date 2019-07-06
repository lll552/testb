<?php

namespace app\common\validate;

use think\Validate;

class Article extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'title|标题' => 'require',
        'tags|文章标签' => 'require',
        'cate_id|所属导航' => 'require',
        'desc|文章描述' => 'require',
        'content|内容' => 'require',
        'is_top|是否推荐' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];

    public function sceneAdd(){
        return $this->only(['title','tags','cate_id','desc','content']);
    }

    public function sceneTop(){
        return $this->only(['is_top']);
    }

    public function sceneEdit(){
        return $this->only(['title','tags','cate_id','desc','content']);
    }
}
