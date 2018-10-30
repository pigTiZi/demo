@extends('admin.show')
@section('content_header')
    <form action="doAttrAdd" method="post">
        {{csrf_field()}}
        <table>
            <tr>
                <td>属性名称：</td>
                <td><input type="text" name="attr_name"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="添加属性"></td>
            </tr>
        </table>
    </form>
@stop