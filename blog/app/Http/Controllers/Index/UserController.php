<?php

namespace App\Http\Controllers\Index;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //注册页面
    public function regForm()
    {
        $data = User::all();
        dd($data);
//        return view('user.reg_form');
    }

    //注册处理
    public function shopRegIn()
    {
        $username = $_POST['username'];
//        var_dump($username);die;
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        if($password!=$repassword){
            return redirect('reg');
        }
        $tel = $_POST['tel'];
    }

    public function loginForm()
    {
        return view('user.login_form');
    }
}
