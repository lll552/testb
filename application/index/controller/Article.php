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
}
