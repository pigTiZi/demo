<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-26
 * Time: 20:04
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\AttrValueService;

class AttrValueController extends Controller
{
    public function attrValueList()
    {
        $attrValue = new AttrValueService();
        $attrValueDatas = $attrValue->attrValueAll();

        dd($attrValueDatas);
    }
}