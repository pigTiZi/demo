@extends('admin.show')
@section('content_header')
    <form action="doAdminAdd" method="post">
        {{csrf_field()}}
        <table>
            <tr>
                <td>管理员名称：</td>
                <td><input type="text" name="admin_name"></td>
            </tr>
            <tr>
                <td>管理员邮箱：</td>
                <td><input type="email" name="admin_email"></td>
            </tr>
            <tr>
                <td>管理员密码：</td>
                <td><input type="password" name="admin_password"></td>
            </tr>
            <tr>
                <td>管理员手机号：</td>
                <td><input type="text" name="admin_mobile"></td>
            </tr>
            <tr>
                <td>是否超级管理员：</td>
                <td><input type="text" name="is_super"></td>
            </tr>
            <tr>
                <td>角色</td>
                <td>
                    <select name="role_id">
                        @foreach($roleDatas as $val)
                            <option value="{{$val['role_id']}}">{{$val['role_name']}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="添加管理员"></td>
            </tr>
        </table>
    </form>
@stop