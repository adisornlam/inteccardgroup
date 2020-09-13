@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        สิทธิ์การใช้งาน
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
        <li class="active">สิทธิ์การใช้งาน</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">รายการสิทธิ์การใช้งาน</h3>
                  <div class="box-tools">
                    <a href="{{route('roles.create')}}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการ</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>หัวข้อ</th>
                      <th>คำอธิบาย</th>
                      <th style="width: 200px">Action</th>
                    </tr>
                    @foreach ($roles as $role)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $role->name}}</td>
                      <td>{{ $role->description}}</td>
                      <td>
                          <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">แก้ไข</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $roles->render() !!}
                </div>
              </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection