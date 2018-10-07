<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/','Index\WelcomeController@index');
//Route::get('index','Index\WelcomeController@index');
//Route::get('add-form','Index\WelcomeController@add_form');
//Route::post('add','Index\WelcomeController@add');
//Route::get('del','Index\WelcomeController@del');
//Route::get('up-form','Index\WelcomeController@up_form');
//Route::post('up','Index\WelcomeController@up');

Route::get('reg','Index\UserController@regform');
Route::get('login','Index\UserController@loginform');
Route::get('shopindex','Index\IndexController@index');
Route::post('reg_in','Index\UserController@shopRegIn');
Route::post('login_in','Index\UserController@shopLogin');

//Route::controller('welcome','Index\WelcomeController');
//Route::get('index','Index\WelcomeController@index');
//Route::get('hello',function (){
//   return "123";
//});