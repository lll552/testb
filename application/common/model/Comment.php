<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Comment extends Model
{
    //
    use SoftDelete;

    public function article(){
        return $this->belongsTo('Article','article_id','id');
    }

    public function member(){
        return $this->belongsTo('Member','member_id','id');
    }

    public function comm($data){

        $validate = new \app\common\validate\Comment();
        if(!$validate->scene('comm')->check($data)){
            return $validate->getError();
        }

        $return = $this->allowField(true)->save($data);
        if($return){
            return 1;
        }else{
            return '添加失败';
        }
    }
}
