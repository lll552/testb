<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Cate extends Model
{
    //
    use SoftDelete;

    public function article(){
        return $this->hasMany('Article','cate_id','id');
    }
    public function add($data){
        $validate = new \app\common\validate\Cate();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }

        $return = $this->save($data);
        if($return){
            return 1;
        }else{
            return '添加失败';
        }
        return view();
    }

    public function sort($data){
        $validate = new \app\common\validate\Cate();
        if(!$validate->scene('sort')->check($data)){
            return $validate->getError();
        }

        $cateInfo = $this->find($data['id']);
        $cateInfo->sort = $data['sort'];

        $return = $cateInfo->save();
        if($return){
            return 1;

        }else{
            return "修改失败";
        }

    }

    public function edit($data){
        $validate = new \app\common\validate\Cate();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }

        $cateInfo = $this->find($data['id']);
        $cateInfo->catename = $data['catename'];
        $return = $cateInfo->save();
        if($return){
            return 1;
        }else{
            return "修改失败";
       }
    }
}
