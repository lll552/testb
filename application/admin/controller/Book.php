<?php

namespace app\admin\controller;

use think\Controller;

class Book extends Base
{
    //
    public function list(){

        $books = model('Book')->paginate(10);
        $viewData = [
            'books' => $books
        ];
        $this->assign($viewData);
        return view();
    }

    public function status(){


        if(request()->isAjax()){

            $data = [
                'id' => input('post.id'),
                'status' => input('post.status') ? 0 : 1
            ];

            $result = model('Book')->status($data);
            if($result == 1){
                $this->success('操作成功','admin/book/list');
            }else{
                $this->error($result);
            }
        }
    }


}
