@extends('admin.show')
@section('content_header')
    <style type = "text/css">
        <!--
        a {font-size:16px}
        a:link {text-decoration:none;}
        -->
    </style>
    <h3>属性列表</h3>
    <a href="attrAdd" class="btn btn-block btn-success">Insert</a>
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
                    <th>分类名称</th>
                    <th>操作</th>
                </tr>
                @foreach($attrDatas as $val)
                    <tr>
                        <td>{{$val['attr_name']}}</td>
                        <td><a href=""><span class="label label-danger">Delete</span></a></td>
                    </tr>
                @endforeach
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
@stop