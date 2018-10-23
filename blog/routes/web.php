<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|--------------------------------------------------------------------------
*/

Route::get('reg','Index\UserController@telephoneRegister');//手机注册表单
Route::post('telephone_reg_in','Index\UserController@doTelephoneRegister');//手机注册处理
Route::get('email_reg','Index\UserController@emailRegister');//邮箱注册表单
Route::post('email_reg_in','Index\UserController@doEmailRegister');//邮箱注册处理

Route::get('login','Index\UserController@login');//登录表单
Route::post('login_in','Index\UserController@doLogin');//登录处理

Route::get('/','Index\IndexController@index'); //商城前台页面展示
Route::get('search_goods','Index\IndexController@searchGoods'); //商城前台搜索功能

Route::get('classifyLists','Index\IndexController@classifyLists'); //商城分类列表

Route::get('particulars','Index\IndexController@particulars'); //商城分类列表


Route::get('admin','Admin\AdminController@login'); //后台登陆页面
Route::post('adminDoLogin','Admin\AdminController@doLogin'); //后台登录处理

Route::group(['middleware' => ['isLogin']], function () {
    Route::get('adminIndex','Admin\AdminController@adminIndex'); //后台展示
    Route::get('admin/adminList','Admin\AdminController@adminList'); //后台管理员展示
    Route::get('admin/adminDel','Admin\AdminController@adminDel'); //后台管理员删除
    Route::get('admin/adminAdd','Admin\AdminController@adminAdd'); //后台添加管理员页面
    Route::post('admin/doAdminAdd','Admin\AdminController@doAdminAdd'); //后台管理员添加处理
    Route::get('admin/menuList','Admin\AdminController@menuList'); //菜单列表展示
    Route::get('admin/menuAdd','Admin\AdminController@menuAdd'); //菜单添加
    Route::get('admin/menuDel','Admin\AdminController@menuDel'); //菜单添加
    Route::post('admin/doMenuAdd','Admin\AdminController@doMenuAdd'); //菜单添加
    Route::get('admin/roleList','Admin\AdminController@roleList'); //角色展示
    Route::get('admin/roleAdd','Admin\AdminController@roleAdd'); //角色添加表单
    Route::post('admin/doRoleAdd','Admin\AdminController@doRoleAdd'); //角色添加处理
    Route::get('admin/roleDel','Admin\AdminController@roleDel'); //角色删除
    Route::get('admin/resourceAdd','Admin\AdminController@resourceAdd'); //分配权限
    Route::post('admin/doResourceAdd','Admin\AdminController@doResourceAdd'); //分配权限
});