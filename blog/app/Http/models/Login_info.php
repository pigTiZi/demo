<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Login_info extends Model
{
    //
    protected $table = 'login_info';
    //指定id
    protected $primaryKey = 'id';

    public function loginInfoAdd($data)
    {
        foreach ($data as $key=>$val){
            $this->$key = $val;
        }
        $result = $this->save();
        return $result;
    }
}
