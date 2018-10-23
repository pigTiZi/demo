<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class goods extends Model
{
    protected $table = 'goods';
    //指定id
    protected $primaryKey = 'goods_id';
    public $timestamps = false;

    //通过分类id查询商品
    public function classifyLists($classify_id)
    {
        $datas = $this->where(['classify_id'=>$classify_id])->get()->toArray();
        return $datas;
    }

    public function particulars($goods_id)
    {
        $particularsData = $this->where(['goods_id'=>$goods_id])->first()->toArray();
        return $particularsData;
    }
}
