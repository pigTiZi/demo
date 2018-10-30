<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-26
 * Time: 18:50
 */
namespace App\Service;

use App\Http\models\Attr;

class AttrService
{
    public function getAttrAll()
    {
        $attr = new Attr();
        $attrDatas = $attr->getAttrAll();
        return $attrDatas;
    }

    public function attrAdd($attr_name)
    {
        $attr = new Attr();
        $result = $attr->attrAdd($attr_name);
        return $result;
    }
}