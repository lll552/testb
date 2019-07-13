<?php

namespace app\index\controller;

use think\Controller;
use think\facade\View;

class Base extends Controller
{
    public function initialize()
    {
        $webInfo = model('System')->find();
        $cates = model('Cate')->order('sort','asc')->select();
        $topArticle = model('Article')->where('is_top',1)->order('create_time','desc')->limit(5)->select();

        $viewData = [
            'cates' => $cates,
            'webInfo' => $webInfo,
            'topArticle' => $topArticle
        ];

        $this->view->share($viewData);
//        View::share($viewData);

    }
}
