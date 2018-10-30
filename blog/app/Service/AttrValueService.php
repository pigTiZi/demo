<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-26
 * Time: 20:24
 */
namespace App\Service;

use App\Http\models\attrValue;

class AttrValueService
{
    public function attrValueAll()
    {
        $attrValue = new attrValue();
        $attrValueDatas = $attrValue->attrValueAll();
        return $attrValueDatas;
    }
}