<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-9
 * Time: 8:58
 */
namespace App\Service;

use App\Http\models\Classify;
use App\Http\models\Goods;

class IndexService
{
    //菜单查询
    public function classifyMenu()
    {
        $classify = new Classify();
        $menuDatas = $classify->classifyAll();
        $menuDatas = $this->getDepartments($menuDatas);
        return $menuDatas;
    }

    //商品搜索
    public function searchGoods($like)
    {
        $goodsDatas = new Classify();
        $datas = $goodsDatas->searchGoods($like);
        return $datas;
    }

    //无限极分类
    public function getDepartments($data,$parent_id = 0)
    {
        $memuDatas = [];
            foreach ($data as $key=>$value){
                if($value['parent_id'] == $parent_id){
                    $memuDatas[$key] = $value;
                    $memuDatas[$key]['children'] = $this->getDepartments($data,$value['classify_id']);
                }
            }
        return $memuDatas;
    }
}