<?php

namespace App\Http\Controllers\Index;

use App\Service\UserService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mews\Captcha\Captcha;

class UserController extends Controller
{
    //注册页面
    public function regForm()
    {
        return view('user.reg_form');
    }

    //注册处理
    public function shopRegIn()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        if($password!=$repassword){
            return redirect('reg');
        }
        $tel = $_POST['tel'];
        $UserService = new UserService();
        $res = $UserService->reg($username,$password,$tel);
        if($res){
            return redirect('login');
        }
    }

    public function loginForm()
    {
        return view('user.login_form');
    }

    public function shopLogin()
    {
        $username = $_POST['username'];
//        dd($username);die;
        $password = $_POST['password'];
        $UserService = new UserService();
        $res = $UserService->login($username,$password);
        if($res){
            return redirect('shopindex');
        }else{
            return redirect('login');
        }
    }
}