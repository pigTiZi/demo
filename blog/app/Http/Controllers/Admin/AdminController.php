<?php
/**
 * Created by PhpStorm.
 * User: lin_0218
 * Date: 2018-10-16
 * Time: 19:29
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Service\AdminManageService;
use App\Service\AdminService;
use App\Service\GoodsService;
use App\Service\MenuService;
use App\Service\ResourceService;
use App\Service\RoleService;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //后台登陆表单
    public function login()
    {
        return view('admin.login');
    }

    //后台管理员登陆处理
    public function doLogin(Request $request)
    {
        $email = $request['email'];
        $password = md5($request['password']);
        $admin = new AdminService();
        $adminInfo = $admin->getAdmin($email,$password);
        if($adminInfo['is_freeze']==1){
            session(['adminInfo'=>$adminInfo]);
            return redirect('adminIndex');
        }else{
            return redirect('admin');
        }
    }

    //后台展示
    public function adminIndex()
    {
        return view('admin.show');
    }

    //管理员列表
    public function adminList()
    {
        $adminManege = new AdminManageService();
        $adminDatas = $adminManege->getAdmins();
        return view('admin.list',['data'=>$adminDatas]);
    }

    //删除管理员
    public function adminDel(Request $request)
    {
        $admin_id = $request['admin_id'];
        $adminManage = new AdminManageService();
        $result= $adminManage->adminDel($admin_id);
        if($result){
            return redirect('admin/adminList');
        }
    }

    //添加管理员
    public function adminAdd()
    {
        $role = new RoleService();
        $roleDatas = $role->getRoleAll();
        return view('admin.add',['roleDatas'=>$roleDatas]);
    }

    //添加管理员处理
    public function doAdminAdd(Request $request)
    {
        $data = $request->validate([
            'admin_name' => 'required|unique:admin',
            'admin_password' => 'required',
            'admin_email'=>'required|email|unique:admin',
            'admin_mobile'=>'required|unique:admin',
        ]);

        $data['admin_password'] = md5($data['admin_password']);
        $role_id =$request['role_id'];
        $admin = new AdminManageService();
        $result = $admin->doAdminAdd($data,$role_id);
        if($result){
            return redirect('admin/adminList');
        }else{
            return redirect('admin/adminAdd');
        }
    }

    //菜单列表
    public function menuList()
    {
        $menu = new MenuService();
        $menuListDatas = $menu->getListAll();
        if($menuListDatas){
            session(['menuDatas'=>$menuListDatas]);
            return view('admin.menu_list',['data'=>$menuListDatas]);
        }
    }

    //菜单添加
    public function menuAdd()
    {
        $menuDatas = session('menuDatas');
        return view('admin.menu_add',['menuDatas'=>$menuDatas]);
    }

    //菜单添加处理
    public function doMenuAdd(Request $request)
    {
        $data = $request->validate([
            'menu_name' => 'required|unique:menu',
            'menu_uri'=>'required',
            'p_id'=>'required',
            'is_menu'=>'required'
        ]);
        $menu = new MenuService();
        $resulut = $menu->doMenuAdd($data);
        if($resulut){
            return redirect('admin/menuList');
        }
    }

    public function menuDel(Request $request)
    {
        $menu_id = $request['id'];
        $menu = new MenuService();
        $result = $menu->menuDel($menu_id);
        if($result){
            return redirect('admin/menuList');
        }
    }

    //角色管理
    public function roleList()
    {
        $role = new RoleService();
        $roleDatas = $role->getRoleAll();
        if($roleDatas){
            return view('admin.role_list',['roleData'=>$roleDatas]);
        }
    }

    public function roleAdd()
    {
        return view('admin/role_add');
    }

    public function doRoleAdd(Request $request)
    {
        $role_name = $request['role_name'];
        $role = new RoleService();
        $result = $role->roleAdd($role_name);
        if($result){
            return redirect('admin/roleList');
        }
    }

    public function roleDel(Request $request)
    {
        $role_id = $request['id'];
        $role = new RoleService();
        $result = $role->roleDel($role_id);
        if($result){
            return redirect('admin/roleList');
        }
    }

    //角色分配权限
    public function resourceAdd()
    {
        $role = new RoleService();
        $roleDatas = $role->getRoleAll();
        $menu = new MenuService();
        $menuDatas = $menu->getListAll();
        return view('admin.resource_add',['roleDatas'=>$roleDatas,'menuDatas'=>$menuDatas]);
    }

    public function doResourceAdd(Request $request)
    {
        $role_id = $request['role_id'];
        $menu_id = $request['menu_id'];
        $resource = new ResourceService();
        $result =  $resource->resourceAdd($role_id,$menu_id);
        if($result){
            return redirect('admin/resourceAdd');
        }
    }

    public function goodsList()
    {
        $goods = new GoodsService();
//        $goodsDatas = $goods->
    }
}