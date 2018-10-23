<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'role';
    //指定id
    protected $primaryKey = 'role_id';
    public $timestamps = false;

    public function getRoleAll()
    {
        $roleDatas = $this->all()->toArray();
        return $roleDatas;
    }

    public function roleAdd($role_name)
    {
        $this->role_name = $role_name;
        $result = $this->save();
        return $result;
    }

    public function roleDel($role_id)
    {
        $result = $this->where(['role_id'=>$role_id])->delete();
        return $result;
    }
}