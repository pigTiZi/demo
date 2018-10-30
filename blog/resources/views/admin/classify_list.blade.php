@extends('admin.show')
@section('content_header')
    <style type = "text/css">
        <!--
        a {font-size:16px}
        a:link {text-decoration:none;}
        -->
    </style>
    <h3>管理员管理</h3>
    <a href="classifyAdd" class="btn btn-block btn-success">Insert</a>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">分类列表</h3>

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
                    <th>ID</th>
                    <th>分类名称</th>
                    <th>uri</th>
                    <th>图片</th>
                    <th>是否展示</th>
                </tr>
                @foreach($data as $val)
                    <tr>
                        <td><?php echo str_repeat('——',$val['level'])?>{{$val['classify_id']}}</td>
                        <td>{{$val['classify_name']}}</td>
                        <td>{{$val['classify_url']}}</td>
                        <td><img src="{{$val['classify_image']}}" alt="" width="80px" height="50px"></td>
                        <td>
                            @if($val['show_status']==1)
                                <span class="label label-success">可用</span>
                            @else
                                <span class="label label-danger">冻结</span>
                        </td>
                        @endif
                        <td><a href=""><span class="label label-danger">Delete</span></a></td>
                    </tr>
                @endforeach
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
@stop