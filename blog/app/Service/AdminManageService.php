<?php
namespace App\service;
use App\Http\models\Admin;
use App\Http\models\admin_role;
use App\Http\models\Role;
use Illuminate\Support\Facades\DB;

class AdminManageService
{
    public function getAdmins()
    {
        $admin = new Admin();
        $adminDatas = $admin->getAdminAll();
        return $adminDatas;
    }

    public function adminDel($admin_id)
    {
        $admin = new Admin();
        $result = $admin->adminDel($admin_id);
        return $result;
    }

    public function doAdminAdd($data,$role_id)
    {
        $admin = new Admin();
        DB::beginTransaction();
        try {
            $result = $admin->doAdminAdd($data);
            $this->adminRoleAdd($result,$role_id);
        }catch(\Exception $e){
            $result = false;
            DB::rollBack();
        }
        return $result;
    }

    //分配角色
    public function adminRoleAdd($admin_id,$role_id)
    {
        $role = new admin_role();
        $result = $role->adminRoleAdd($admin_id,$role_id);
        return $result;
    }
}