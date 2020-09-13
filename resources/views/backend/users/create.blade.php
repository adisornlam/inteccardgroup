@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มผู้ใช้งาน
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
      <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i>ผู้ใช้งาน</a></li>
        <li class="active">เพิ่มผู้ใช้งาน</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{route('users.store')}}">
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  {{Form::label('name', 'ชื่อ - นามสกุล', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-6">
                    {{Form::text('name', old('name'),['class'=>'form-control','required'])}}
                    <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('email', 'อีเมล์', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-6">
                    {{Form::email('email', old('email'),['class'=>'form-control','required'])}}
                    <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('password', 'รหัสผ่าน', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-6">
                    {{Form::text('password', NULL,['class'=>'form-control','required'])}}
                    <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('roles', 'สิทธิ์การใช้งาน', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-4">
                    <select class="form-control" name="role_id" required>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">ยกเลิก</button>
                <button type="submit" class="btn btn-info pull-right">บันทึก</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection