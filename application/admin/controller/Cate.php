<?php

namespace app\admin\controller;

use think\Controller;

class Cate extends Controller
{
    //
    public function list(){
        $cates = model('Cate')->order('sort')->paginate(3);
        $data = [
            'cates' => $cates
        ];
        $this->assign($data);
        return view();
    }

    public function add(){

        if(request()->isAjax()){

            $data = [
                'catename' => input('post.catename'),
                'sort' => input('post.sort')
            ];

            $result  = model('Cate')->add($data);

            if($result == 1){
                $this->success('添加成功','admin/cate/list');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    public function sort(){
        if(request()->isAjax()){
            $data = [
                'sort' => input('post.sort'),
                'id' => input('post.id')
            ];
            $result = model('Cate')->sort($data);
            if($result == 1){
                $this->success('排序成功',"admin/cate/list");
            }else{
                $this->error($result);
            }

        }


        return view();
    }

    public function edit(){

        if(request()->isAjax()){
            $data = [
                'id' => input('post.id'),
                'catename' => input('post.catename')
            ];

            $result = model('Cate')->edit($data);
            if($result == 1){
                $this->success('修改成功','admin/cate/list');
            }else{
                $this->error($result);
            }
        }


        $cataInfo = model('Cate')->find(input('id'));
        $viewData = [
            'cateInfo' => $cataInfo
        ];
        $this->assign($viewData);
        return view();
    }

    public function del(){
        if(request()->isAjax()){
            $cateInfo = model('Cate')->find(input('post.id'));
            $return = $cateInfo->delete();
            if($return){
                $this->success('栏目删除成功','admin/cate/list');
            }else{
                $this->error("栏目删除失败");
            }
        }
    }
}
