<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//Route::get('/','admin/index/login');
Route::rule('login','admin/index/login','GET|POST');
Route::rule('register','admin/index/register','GET|POST');
Route::rule('forget','admin/index/forget','GET|POST');
Route::rule('reset','admin/index/reset','GET|POST');
Route::rule('index','admin/home/index','GET');
Route::rule('logout','admin/home/logout','POST');
Route::rule('catelist','admin/cate/list','get');
Route::rule('cateadd','admin/cate/add','GET|POST');
Route::rule('catesort','admin/cate/sort','get|post');
Route::rule('cateedit/[:id]','admin/cate/edit','get|post');
Route::rule('catedel','admin/cate/del','post');
Route::rule('articlelist','admin/article/list','get');
Route::rule('articleadd','admin/article/add','get|post');
Route::rule('articletop','admin/article/top','post');
Route::rule('articleedit/[:id]','admin/article/edit','get|post');
Route::rule('articledel','admin/article/del','post');
return [

];
//
//Route::group('admin',function(){
//
//    Route::rule('login','admin/Index/login','get|post');
//});
