<?php

namespace app\admin\controller;

use think\Controller;
use think\model\concern\SoftDelete;

class Article extends Base
{
    //



    public function add(){
        if(request()->isAjax()){
            $data = [
                'title' => input('post.title'),
                'tags' => input('post.tags'),
                'is_top' => input('post.istop',0),
                'desc' => input('post.desc'),
                'content' => input('post.content'),
                'cate_id' => input('post.cateid')

            ];

            $result = model('Article')->add($data);
            if($result == 1){
                $this->success('添加成功','admin/article/list');
            }else{
                $this->error($result);
            }
        }

        $cates = model('cate')->select();
        $viewData = [
            'cates' => $cates
        ];
        $this->assign($viewData);
        return view();
    }

    public function list(){
        $articles = model('Article')->with('cate')->order(['is_top','create_time' =>'desc'])->paginate(3);
        $viewData = [
            'articles' => $articles
        ];
        $this->assign($viewData);
        return view();
    }

    public function top(){


        if(request()->isAjax()){

            $data = [
                'id' => input('post.id'),
                'is_top' => input('post.is_top') ? 0 : 1
            ];

            $result = model('Article')->top($data);
            if($result == 1){
                $this->success('操作成功','admin/article/list');
            }else{
                $this->error($result);
            }
        }
    }

    public function edit(){

        if(request()->isAjax()){

            $data = [
                'id' =>input('post.dataid'),
                'title' => input('post.title'),
                'tags' => input('post.tags'),
                'is_top' => input('post.istop'),
                'desc' => input('post.desc'),
                'content' => input('post.content'),
                'cate_id' => input('post.cateid')

            ];

            $result = model('Article')->edit($data);
            if($result == 1){
                $this->success('编辑成功','admin/article/list');
            }else{
                $this->error($result);
            }
        }

        $articleInfo = model('Article')->find(input('id'));
        $cates = model('Cate')->select();
        $viewData = [
            'article' => $articleInfo,
            'cates' => $cates

        ];

        $this->assign($viewData);
        return view();
    }

    public function del(){
        if(request()->isAjax()){
            $articleInfo = model('Article')->with('comments')->find(input('post.id'));
            $result = $articleInfo->together('comments')->delete();
            if($result){
                $this->success('删除'.input('post.name').'成功','admin/article/list');
            }else{
                $this->error($result);
            }

        }
    }
}


