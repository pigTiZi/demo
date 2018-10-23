@extends('admin.show')
@section('content_header')
    <form action="doRoleAdd" method="post">
        {{csrf_field()}}
        <table>
            <tr>
                <td>角色名称：</td>
                <td><input type="text" name="role_name"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="添加角色"></td>
            </tr>
        </table>
    </form>
@stop