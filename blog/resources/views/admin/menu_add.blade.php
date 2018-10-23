@extends('admin.show')
@section('content_header')
    <form action="doMenuAdd" method="post">
        {{csrf_field()}}
        <table>
            <tr>
                <td>菜单名称：</td>
                <td><input type="text" name="menu_name"></td>
            </tr>
            <tr>
                <td>菜单URI：</td>
                <td><input type="text" name="menu_uri"></td>
            </tr>
            <tr>
                <td>父级菜单：</td>
                <td><select name="p_id">
                        <option value="0">父级菜单</option>
                        @foreach($menuDatas as $val)
                            <option value="{{$val['menu_id']}}"><?php echo str_repeat('——',$val['level'])?>{{$val['menu_name']}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>是否展示：</td>
                <td><input type="text" name="is_menu"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="添加添加菜单"></td>
            </tr>
        </table>
    </form>
@stop