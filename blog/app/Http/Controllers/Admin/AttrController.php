<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-26
 * Time: 18:45
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\AttrService;
use Illuminate\Http\Request;

class AttrController extends Controller
{
    //属性展示
    public function attrList()
    {
        $attr = new AttrService();
        $attrDatas = $attr->getAttrAll();
        return view('admin.attr_list',['attrDatas'=>$attrDatas]);
    }

    //属性添加
    public function attrAdd()
    {
        return view('admin.attr_add');
    }

    public function doAttrAdd(Request $request)
    {
        $attr_name = $request['attr_name'];
        $attr = new AttrService();
        $result = $attr->attrAdd($attr_name);
        if($result){
            return redirect('admin/attrList');
        }
    }
}