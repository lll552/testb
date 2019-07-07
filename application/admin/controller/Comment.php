<?php

namespace app\admin\controller;

use think\Controller;

class Comment extends Controller
{
    //
    public function all(){
        $commentInfo = model('Comment')->with('article,member')->order('create_time','desc')->paginate(3);
        $viewData = [
            'comment' => $commentInfo
        ];
        $this->assign($viewData);
        return view();
    }

    public function del(){
        $commentInfo = model('Comment')->find(input('post.id'));
        $result = $commentInfo->delete();
        if($result){
            $this->success('删除成功','admin/comment/all');
        }else{
            $this->error($result);
        }
    }


}
