<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(){
        //渲染视图文件
        $users = DB::table('user')->get();
        return view('welcome.index',['data'=>$users]);
//        var_dump($users);
    }
    public function add_form()
    {
        return view('welcome.add_form');
    }
    public function add()
    {
        $username = $_POST['username'];
//        var_dump($username);die;
        $res = DB::table('user')->insert(['username'=>$username]);
        if($res){
            return redirect('index');
        }
    }

    public function del()
    {
        $id = $_GET['id'];
        $res = DB::table('user')->delete($id);
        if($res){
            return redirect('index');
        }
    }
    public function up_form()
    {
        $id = $_GET['id'];
        $res = DB::table('user')->where('id',$id)->first();
//        var_dump($res);die;
        if($res){
            return view('welcome.up_form',['data'=>$res]);
        }
    }
    public function up()
    {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $res = DB::table('user')->where('id',$id)->update(['username'=>$username]);
        if($res){
            return redirect('index');
        }
    }
}
