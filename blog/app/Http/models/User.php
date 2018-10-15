<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    //制定表命
    protected $table = 'user';
    //指定id
    protected $primaryKey = 'id';
    public $timestamps = false;

    //手机号注册添加
    public function doRegister($data)
    {
        foreach ($data as $key=>$val){
            $this->$key = $val;
        }
        $result = $this->save();
        return $result;
    }

    //邮箱注册添加
    public function doEmailRegister($data)
    {
        foreach ($data as $key=>$val){
            $this->$key = $val;
        }
        $result = $this->save();
        return $this->email;
    }

    //登录 查询一条数据
    public function doLogin($accountNumber,$password)
    {
        $result = $this->where(['username'=>$accountNumber])->orwhere(['email'=>$accountNumber])->orwhere(['tel'=>$accountNumber])->where(['password'=>$password])->first()->toArray();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}
