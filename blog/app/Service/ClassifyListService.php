<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-16
 * Time: 9:23
 */
namespace App\Service;

use App\Http\models\Classify;
use App\Http\models\goods;

class ClassifyListService
{
    public function classifyLists($classify_id)
    {
        $goods = new goods();
        $classifyDatas = $goods->classifyLists($classify_id);
        return $classifyDatas;
    }

    public function particulars($goods_id)
    {
        $goods = new goods();
        $particularsData = $goods->particulars($goods_id);
        return $particularsData;
    }

    //获取所有分类
    public function getClassifyAll()
    {
        $classify = new Classify();
        $classifyDatas = $classify->classifyAll();
        $classifyDatas = $this->getTree($classifyDatas);
        return $classifyDatas;
    }

    public function classifyAdd($data)
    {
        $classify = new Classify();
        $result = $classify->classifyAdd($data);
        return $result;
    }

    function getTree($array, $pid =0, $level = 0){

        //声明静态数组,避免递归调用时,多次声明导致数组覆盖
        static $list = [];
        foreach ($array as $key => $value){
            //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
            if ($value['parent_id'] == $pid){
                //父节点为根节点的节点,级别为0，也就是第一级
                $value['level'] = $level;
                //把数组放到list中
                $list[] = $value;
                //把这个节点从数组中移除,减少后续递归消耗
                unset($array[$key]);
                //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
                $this->getTree($array, $value['classify_id'], $level+1);
            }
        }
        return $list;
    }
}