<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-26
 * Time: 18:55
 */
namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    protected $table = 'attr';
    //指定id
    protected $primaryKey = 'attr_id';
    public $timestamps = false;

    public function getAttrAll()
    {
        $attrDatas = $this->all()->toArray();
        return $attrDatas;
    }

    public function attrAdd($attr_name)
    {
        $this->attr_name = $attr_name;
        $result = $this->save();
        return $result;
    }
}