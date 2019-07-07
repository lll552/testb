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
}
