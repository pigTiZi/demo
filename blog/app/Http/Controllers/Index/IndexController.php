<?php

namespace App\Http\Controllers\Index;

use App\Service\IndexService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\In;

class IndexController extends Controller
{
    //商城前台页面
    public function index()
    {
        $username = session('username');
        $indexService = new IndexService();
        $menuDatas = $indexService->classifyMenu();
        return view('index.index',['data'=>$menuDatas,'username'=>$username]);
    }

    //首页商品搜索
    public function searchGoods(Request $request)
    {
        $goodsName = $request['searchGoods'];
        $goodsDatas = new IndexService();
        $datas = $goodsDatas->searchGoods($goodsName);
        dd($datas);
    }
}
