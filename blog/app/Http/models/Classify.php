<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Classify extends Model
{
    //表名
    protected $table = 'classify';
    //指定id
    protected $primaryKey = 'classify_id';
    public $timestamps = false;

    //前台菜单展示
    public function classifyAll()
    {
        $menuDatas = $this->all()->toArray();
        return $menuDatas;
    }

    //商品搜索
    public function searchGoods($like)
    {
        $datas = $this->where('classify_name','like','%'.$like.'%')->get()->toArray();
        return $datas;
    }
}
