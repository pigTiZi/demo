<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menu';
    //指定id
    protected $primaryKey = 'menu_id';
    public $timestamps = false;

    public function getMenuList()
    {
        $menuListDatas = $this->all()->toArray();
        return $menuListDatas;
    }

    public function doMenuAdd($data)
    {
        foreach ($data as $key=>$val){
            $this->$key = $val;
        }
        $this->save();
        if ($this->p_id == 0){
            $this->path = $this->menu_id;
        }else{
            $this->path = $this->p_id."-".$this->menu_id;
        }
        $result = $this->save();
        return $result;
    }

    public function menuDel($menu_id)
    {
        $result = $this->where(['menu_id'=>$menu_id])->orwhere(['p_id'=>$menu_id])->delete();
        return $result;
    }
}
