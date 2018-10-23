<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-16
 * Time: 9:23
 */
namespace App\Service;

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
}