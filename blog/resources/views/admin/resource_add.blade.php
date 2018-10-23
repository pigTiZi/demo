@extends('admin.show')
@section('content_header')
    <form action="doResourceAdd" method="post">
        {{csrf_field()}}
        <table>
            <tr>
                <td>选择角色</td>
                <td><select name="role_id">
                        @foreach($roleDatas as $val)
                            <option value="{{$val['role_id']}}">{{$val['role_name']}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>选择权限</td>
                <td>
                    @foreach($menuDatas as $val)
                        <input type="checkbox" value="{{$val['menu_id']}}" name="menu_id[]">{{$val['menu_name']}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="添加添加菜单"></td>
            </tr>
        </table>
    </form>
@stop