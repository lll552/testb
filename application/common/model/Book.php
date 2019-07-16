<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Book extends Model
{
    //

    use SoftDelete;

    public function status($data){
        $validate = new  \app\common\validate\Book();
        if(!$validate->scene('status')->check($data)){
            return $validate->getError();
        }

        $bookInfo = $this->find($data['id']);
        $bookInfo->status = $data['status'];
        $return = $bookInfo -> save();
        if($return){
            return 1;
        }else{
            return "操作失败";
        }

    }
}
