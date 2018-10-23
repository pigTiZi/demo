<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class admin_role extends Model
{
    //
    protected $table = 'admin_role';

    public $timestamps = false;

    public function adminRoleAdd($admin_id,$role_id)
    {
        $this->admin_id = $admin_id;
        $this->role_id = $role_id;
        $result = $this->save();
        return $result;
    }
}
