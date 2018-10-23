<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-19
 * Time: 9:50
 */
namespace App\Service;

use App\Http\models\Menu;

class MenuService
{
    public function getListAll()
    {
        $menu = new Menu();
        $menuListDatas = $menu->getMenuList();
        $menuListDatas = $this->getTree($menuListDatas);
        return $menuListDatas;
    }

    function getTree($array, $pid =0, $level = 0){

        //声明静态数组,避免递归调用时,多次声明导致数组覆盖
        static $list = [];
        foreach ($array as $key => $value){
            //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
            if ($value['p_id'] == $pid){
                //父节点为根节点的节点,级别为0，也就是第一级
                $value['level'] = $level;
                //把数组放到list中
                $list[] = $value;
                //把这个节点从数组中移除,减少后续递归消耗
                unset($array[$key]);
                //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
                $this->getTree($array, $value['menu_id'], $level+1);
            }
        }
        return $list;
    }

    public function doMenuAdd($data)
    {
        $menu = new Menu();
        $result = $menu->doMenuAdd($data);
        return $result;
    }

    public function menuDel($menu_id)
    {
        $menu = new Menu();
        $result = $menu->menuDel($menu_id);
        return $result;
    }
}