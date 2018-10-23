<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    //
    protected $table = 'admin';
    //指定id
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    //登录处理
    public function getAdmin($email,$password)
    {
        $data = $this->where(['admin_email'=>$email,'admin_password'=>$password])->first()->toArray();
        return $data;
    }

    //左侧菜单
    public function getMenu($admin_id)
    {
        $menuDatas = DB::select("select * from menu where menu_id in(select menu_id from resource where role_id = (select role_id from admin_role where admin_id = $admin_id))");
        return $menuDatas;
    }

    //管理员查询所有
    public function getAdminAll()
    {
        $adminDatas = $this->all()->toArray();
        return $adminDatas;
    }

    //删除管理员
    public function adminDel($admin_id)
    {
        $result = $this->where('admin_id',$admin_id)->delete();
        return $result;
    }

    //添加处理
    public function doAdminAdd($data)
    {
        foreach ($data as $key=>$val){
            $this->$key = $val;
        }
        $this->save();
        $admin_id = $this->admin_id;
        return $admin_id;
    }
}
