<?php

namespace app\index\controller;

use think\Controller;

class Article extends Base
{
    public function info(){

        $articleInfo = [];
        if(input('?id')){
            $articleInfo = model('Article')->with('comments','comments.content')->find(input('id'));
            $articleInfo->setInc('click');
        }

        $viewData = [
            'articleInfo' => $articleInfo
        ];
        $this->assign($viewData);
        return view();
    }

    public function comm(){
        $data = [
            'article_id' => input('post.article_id'),
            'member_id' => input('post.member_id'),
            'content' => input('post.content')
        ];

        $result = model('Comment')->comm($data);

        if($result == 1){
            $this->success('添加评论');
        }else{
            $this->error($result);
        }
    }
}
