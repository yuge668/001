<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Route::get('/admin/users  ','admin\IndexController@index');
//修改密码
Route::get('/admin/passwd','admin\IndexController@passwd');
//执行修改密码
Route::post('/admin/dopasswd','admin\IndexController@dopasswd');
//用户管理
Route::resource('/admin/users','admin\IndexController');
//文章管理
Route::resource('/admin/article','admin\ArticleController');
//分类管理
Route::resource('/admin/sort','admin\SortController');
//后台登录
Route::get('/admin/login','admin\LoginController@login');
Route::post('/admin/dologin','admin\LoginController@dologin');
Route::get('/admin/out','admin\LoginController@out');

















Route::get('/', function () {
    return view('welcome');
});
