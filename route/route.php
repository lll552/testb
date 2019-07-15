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
Route::rule('cate/[:id]','index/index/index','get');
Route::rule('/','index/index/index');
Route::rule('article-<id>','index/article/info','get');
Route::rule('register','index/index/register','get|post');
Route::rule('login','index/index/login','get|post');
Route::rule('loginout','index/index/loginout','post');
Route::rule('search','index/index/search','get');
Route::rule('comm','index/article/comm','post');
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
Route::rule('memberall','admin/member/all','get');
Route::rule('memberadd','admin/member/add','get|post');
Route::rule('memberedit/[:id]','admin/member/edit','get|post');

Route::rule('memberdel','admin/member/del','post');
Route::rule('adminlist','admin/admin/all','get');
Route::rule('adminadd','admin/admin/add','get|post');
Route::rule('adminstatus','admin/admin/status','post');
Route::rule('adminedit/[:id]','admin/admin/edit','get|post');
Route::rule('admindel','admin/admin/del','post');
Route::rule('commentlist','admin/comment/all','get');
Route::rule('commentdel','admin/comment/del','post');
Route::rule('systemset','admin/system/set','get|post');
return [

];
//
//Route::group('admin',function(){
//
//    Route::rule('login','admin/Index/login','get|post');
//});
