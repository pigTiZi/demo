<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-17
 * Time: 10:32
 */
namespace App\Service;

use App\Http\models\Admin;

class AdminService
{
    public function getAdmin($email,$password)
    {
        $admin = new Admin();
        $data = $admin->getAdmin($email,$password);
        return $data;
    }
    public function getMenu()
    {
        $admin_id = session('adminInfo.admin_id');
        $admin = new Admin();
        $menuDatas = $admin->getMenu($admin_id);
        $array = [];
        foreach ($menuDatas as $key=>$value){
            $array[$key]['menu_id'] = $value->menu_id;
            $array[$key]['text'] = $value->menu_name;
            $array[$key]['url'] = $value->menu_uri;
            $array[$key]['p_id'] = $value->p_id;
            $array[$key]['path'] = $value->path;
            $array[$key]['is_menu'] = $value->is_menu;
        }
        $menuDatas = $this->getDepartments($array);
        return $menuDatas;
    }

    //无限极分类
    public function getDepartments($data,$name='submenu',$parent_id = 0)
    {
        $memuDatas = [];
        foreach ($data as $value){
            if($value['p_id'] == $parent_id){
//                $memuDatas[$key] = $value;
//                $memuDatas[$key]['submenu'] = $this->getDepartments($data,$value['menu_id']);
//                $memuDatas[$key]['submenu'] = $this->getDepartments($data,$value)
                $value['submenu'] = $this->getDepartments($data,$name,$value['menu_id']);
                $memuDatas[] = array_filter($value);
            }
        }
        array_filter($memuDatas);
        return $memuDatas;
    }
}