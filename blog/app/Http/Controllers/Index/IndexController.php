<?php

namespace App\Http\Controllers\Index;

use App\Http\models\goods;
use App\Service\ClassifyListService;
use App\Service\IndexService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules\In;

class IndexController extends Controller
{
    //商城前台页面
    public function index()
    {
        $username = session('username');
        $data = Redis::get('menuDatas');
        if($data){
            $menuDatas = json_decode($data,TRUE);
            Redis::del('menuDatas');
            return view('index.index',['data'=>$menuDatas,'username'=>$username]);
        }else{
            $indexService = new IndexService();
            $menuDatas = $indexService->classifyMenu();
//            dd($menuDatas);
            $jsonData = json_encode($menuDatas);
            $redisData = Redis::set('menuDatas',$jsonData);
            return view('index.index',['data'=>$menuDatas,'username'=>$username]);
        }
    }

    //首页商品搜索
    public function searchGoods(Request $request)
    {
        $goodsName = $request['searchGoods'];
        $goodsDatas = new IndexService();
        $datas = $goodsDatas->searchGoods($goodsName);
    }

    //分类筛选
    public function classifyLists(Request $request)
    {
        $classify_id = $request['classify_id'];
        $show_status = $request['show_status'];
        $classifyList = new ClassifyListService();
        $datas = $classifyList->classifyLists($classify_id);
        if($show_status==0){
            return view('index.list',['data'=>$datas]);
        }else{
            return view();
        }
    }

    //商品详情
    public function particulars(Request $request)
    {
        $goodsId = $request['goods_id'];
        $goods = new goods();
        $data = $goods->particulars($goodsId);
//        dd($data);
        return view('index.particulars',['data'=>$data]);
    }
}
