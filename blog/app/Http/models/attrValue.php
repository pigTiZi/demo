<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class attrValue extends Model
{
    protected $table = 'attrValue';
    //指定id
    protected $primaryKey = 'attrValue_id';
    public $timestamps = false;

    public function attrValueAll()
    {
        $attrValueDatas = $this->all()->toArray();
        return $attrValueDatas;
    }

    public function 

}
