<?php

namespace App\Http\Controllers\Index;

use App\Jobs\SendEmail;
use App\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mews\Captcha\Captcha;

class UserController extends Controller
{
    //手机号注册页面
    public function telephoneRegister()
    {
        return view('user.reg_form');
    }

    // 邮箱注册页面
    public function emailRegister()
    {
        return view('user.email_form');
    }

    //手机号注册处理
    public function doTelephoneRegister(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:user',
            'password' => 'required|alpha_num',
            'repassword'=>'required|same:password',
            'tel'=>'required|digits:11|unique:user',
            'captcha'=>'required|captcha'
        ]);
        $data['password'] = md5($data['password']);
        unset($data['repassword']);
        unset($data['captcha']);
        $userService = new UserService();
        $result = $userService->doTelephoneRegister($data);
        if($result){
            return redirect('login');
        }
    }

    //邮箱注册处理
    public function doEmailRegister(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:user',
            'password' => 'required|alpha_num',
            'repassword'=>'required|same:password',
            'email'=>'required|email|unique:user',
            'captcha'=>'required|captcha'
        ]);
        $data['password'] = md5($data['password']);
        unset($data['repassword']);
        unset($data['captcha']);
        $userService = new UserService();
        $result = $userService->doEmailRegister($data);
        if($result){
            return redirect('login');
        }
    }

    //登录表单
    public function login()
    {
        return view('user.login_form');
    }

    //登录处理
    public function doLogin(Request $request)
    {
        $data = $request->validate([
            'captcha'=>'required|captcha'
        ]);
        $accountNumber = $request['accountNumber'];
        $password = md5($request['password']);
        $userService = new UserService();
        $result = $userService->doLogin($accountNumber,$password);
//        dd($result);
        if($result){
            $username = session(['username'=>$result]);
            return redirect('shopindex');
        }else{
            return redirect('login');
        }
    }
}