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
        $menuDatas = $this->where(['show_status'=>1])->get()->toArray();
        return $menuDatas;
    }

    public function classifyAdd($data)
    {
        foreach ($data as $key=>$val)
        {
            $this->$key = $val;
        }
        $result = $this->save();
        return $result;
    }
}
