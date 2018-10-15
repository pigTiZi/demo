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

Route::get('shopindex','Index\IndexController@index'); //商城前台页面展示
Route::get('search_goods','Index\IndexController@searchGoods'); //商城前台页面展示