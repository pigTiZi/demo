<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $table = 'resource';
    //指定id
    public $timestamps = false;

    public function resourceAdd($role_id,$menu_id)
    {
        foreach ($menu_id as $key=>$val){
            $data[$key] = [
                'role_id'=>$role_id,
                'menu_id'=>$val
            ];
        }
        $result = $this->insert($data);
        return $result;
    }
}
