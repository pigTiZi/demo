<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-19
 * Time: 13:47
 */
namespace App\Service;

use App\Http\models\Role;

class RoleService
{
    public function getRoleAll()
    {
        $role = new Role();
        $roleDatas = $role->getRoleAll();
        return $roleDatas;
    }

    public function roleAdd($role_name)
    {
        $role = new Role();
        $result = $role->roleAdd($role_name);
        return $result;
    }

    public function roleDel($role_id)
    {
        $role = new Role();
        $result = $role->roleDel($role_id);
        return $result;
    }
}