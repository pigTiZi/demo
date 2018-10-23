@extends('admin.show')
@section('content_header')
    <style type = "text/css">
        <!--
        a {font-size:16px}
        a:link {text-decoration:none;}
        -->
    </style>
    <h3>管理员管理</h3>
    <a href="adminAdd" class="btn btn-block btn-success">Insert</a>
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
                    <th>ID</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Reason</th>
                </tr>
                @foreach($data as $val)
                <tr>
                    <td>{{$val['admin_id']}}</td>
                    <td>{{$val['admin_name']}}</td>
                    <td>{{$val['admin_email']}}</td>
                    <td>{{$val['admin_mobile']}}</td>
                    <td>
                        @if($val['is_freeze']==1)
                            <span class="label label-success">可用</span>
                            @else
                            <span class="label label-danger">冻结</span>
                    </td>
                    @endif
                    <td><a href="adminDel?admin_id={{$val['admin_id']}}"><span class="label label-danger">Delete</span></a></td>
                </tr>
                @endforeach
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
    @stop