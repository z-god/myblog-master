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

use think\Route;

//admin API
Route::rule('login','api/Login/index');
Route::get('article/:page','api/Article/getArticle');
Route::get('tags','api/Tags/getTagsList');
Route::get('admin/tags/:id','api/Tags/getTagsById');
Route::get('comments','api/Comment/getComments');
Route::get('link','api/Link/getLink');
Route::get('images','api/Img/getImages');
Route::get('data','api/Total/getTotalWebData');
Route::get('user','api/User/getUser');
Route::rule('article/add','api/Article/addArticle');
Route::rule('status/:id','api/Article/updateStatus');
Route::rule('delete/:id','api/Article/deleteArticle');
Route::rule('check/:id','api/Article/checkArticle');
Route::rule('comment/status/:id','api/Comment/updateByStatus');
Route::rule('comment/delete/:id','api/Comment/deleteByStatus');
Route::rule('comment/check/:id','api/Comment/checkByStatus');
Route::get('mp3','api/Music/getMusic');
//font API
Route::get('normal/:page','api/Article/getNormalArticle');//获取状态为1的文章