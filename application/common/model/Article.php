<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Article extends Model
{
    use SoftDelete;
    //

    public function cate(){
        return $this->belongsTo('Cate','cate_id','id');
    }

    public function  add($data){
        $validate = new \app\common\validate\Article();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }

        $return = $this->allowField(true)->save($data);
        if($return ){
            return 1;
        }else {
            return '添加失败';
        }


    }

    public function top($data){
        $validate = new  \app\common\validate\Article();
        if(!$validate->scene('top')->check($data)){
            return $validate->getError();
        }

        $articleInfo = $this->find($data['id']);
        $articleInfo->is_top = $data['is_top'];
        $return = $articleInfo -> save();
        if($return){
            return 1;
        }else{
            return "操作失败";
        }

    }

    public function edit($data){
        $validate = new \app\common\validate\Article();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }

        $articleInfo = $this->find($data['id']);
        $articleInfo->title = $data['title'];
        $articleInfo->tags = $data['tags'];
        $articleInfo->is_top = $data['is_top'];
        $articleInfo->desc = $data['desc'];
        $articleInfo->content = $data['content'];
        $articleInfo->cate_id = $data['cate_id'];

        $result = $articleInfo->save();
        if($result){
            return 1;
        }else{
            return "编辑失败";
        }


    }
}
