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

    public function add(){
//        $filename = './static/uploads/'.$_POST['filename'];//确定上传的文件名
//
////第一次上传时没有文件，就创建文件，此后上传只需要把数据追加到此文件中
//
//        if(!file_exists($filename)){
//
//            move_uploaded_file($_FILES['video']['tmp_name'],$filename);
//
//        }else{
//
//            file_put_contents($filename,file_get_contents($_FILES['video']['tmp_name']),FILE_APPEND);
//
//        }
        return view();
    }

    public function upload(){

        $filename = './static/uploads/'.$_POST['filename'];//确定上传的文件名

//第一次上传时没有文件，就创建文件，此后上传只需要把数据追加到此文件中

        if(!file_exists($filename)){

            move_uploaded_file($_FILES['video']['tmp_name'],$filename);

        }else{

            file_put_contents($filename,file_get_contents($_FILES['video']['tmp_name']),FILE_APPEND);

        }
        return view();
    }





}
