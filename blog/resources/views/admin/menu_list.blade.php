@extends('admin.show')
@section('content_header')
    <style type = "text/css">
        <!--
        a {font-size:16px}
        a:link {text-decoration:none;}
        -->
    </style>
    <h3>菜单管理</h3>
    <a href="menuAdd" class="btn btn-block btn-success">Insert</a>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">管理员列表</h3>

            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody><tr>
                    <th>menu_name</th>
                    <th>menu_uri</th>
                    <th>p_id</th>
                    <th>path</th>
                    <th>is_menu</th>
                </tr>
                @foreach($data as $val)
                    <tr>
                        <td><?php echo str_repeat('——',$val['level'])?>{{$val['menu_name']}}</td>
                        <td>{{$val['menu_uri']}}</td>
                        <td>{{$val['p_id']}}</td>
                        <td>{{$val['path']}}</td>
                        <td>
                            @if($val['is_menu']==1)
                                <span class="label label-success">展示</span>
                            @else
                                <span class="label label-danger">不展示</span>
                            @endif
                        </td>
                        <td><a href="menuDel?id={{$val['menu_id']}}"><span class="label label-danger">Delete</span></a></td>
                    </tr>
                @endforeach
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
@stop