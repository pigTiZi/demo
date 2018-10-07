<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //制定表命
    protected $table = 'user';
    //指定id
    protected $primaryKey = 'id';
    public $timestamps = false;
}