<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-9-29
 * Time: 10:05
 */
namespace App\Service;

use App\User;

class UserService
{
    //注册
    public function reg($username,$password,$tel)
    {
        $user = new User();
        $user->username = $username;
        $user->password = $password;
        $user->tel = $tel;
        $res = $user->save();
        return $res;
    }

    //登录
    public function login($username,$password)
    {
        $res = User::where(['username'=>$username,'password'=>$password])->first();
        if($res){
            return true;
        }
    }
}