@extends('admin.show')
@section('content_header')
    <form action="doClassifyAdd" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <table>
            <tr>
                <td>分类名称：</td>
                <td><input type="text" name="classify_name"></td>
            </tr>
            <tr>
                <td>父级分类：</td>
                <td>
                    <select name="parent_id">
                        <option value="0">父级菜单</option>
                        @foreach($data as $val)
                            <option value="{{$val['classify_id']}}"><?php echo str_repeat('——',$val['level'])?>{{$val['classify_name']}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>分类uri：</td>
                <td><input type="text" name="classify_url"></td>
            </tr>

            <tr>
                <td>分类图片：</td>
                <td><input type="file" name="classify_image"></td>
            </tr>
            <tr>
                <td>是否展示：</td>
                <td><input type="text" name="show_status"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="添加分类"></td>
            </tr>
        </table>
    </form>
@stop