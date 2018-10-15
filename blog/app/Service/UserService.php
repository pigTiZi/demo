<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-9-29
 * Time: 10:05
 */
namespace App\Service;

use App\Http\models\Login_info;
use App\Http\models\User;
use App\Jobs\SendEmail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Mail;

class UserService
{
    use DispatchesJobs;
    //手机号注册处理
    public function doTelephoneRegister($data)
    {
        $user = new User();
        $result = $user->doRegister($data);
        return $result;
    }

    //邮箱注册处理
    public function doEmailRegister($data)
    {
        $user = new User();
        $email = $user->doEmailRegister($data);
        $this->dispatch(new SendEmail($email));
        return $email;
    }

    //登录
    public function doLogin($accountNumber,$password)
    {
        $user = new User();
        $result = $user->doLogin($accountNumber,$password);
        if($result){
            $email = $result['email'];
            $ip = $this->getip();
            $city = $this->getcity($ip);
            $loginInfo = [
                'user_id'=>$result['user_id'],
                'ip'=>$ip,
                'city'=>$city
            ];
            $loginInfoCode = new Login_info();
            $info = $loginInfoCode->loginInfoAdd($loginInfo);
            return $result;
        }
    }

    //获取ip
    function getip(){
        $ip_json = @file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=myip");
        $ip_arr=json_decode(stripslashes($ip_json),1);
        if($ip_arr['code']==0)
        {
            return $ip_arr['data']['ip'];
        }
    }

    //获取城市信息
    function getcity($ip)
    {
        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
        $ip=json_decode(file_get_contents($url));
        if((string)$ip->code=='1'){
            return false;
        }
        $data = (array)$ip->data;
        return $data['city'];
    }
}