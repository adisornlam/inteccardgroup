@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มสิทธิ์การใช้งาน
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
      <li><a href="{{route('roles.index')}}"><i class="fa fa-key"></i>สิทธิ์การใช้งาน</a></li>
        <li class="active">เพิ่มสิทธิ์การใช้งาน</li>
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
            <form class="form-horizontal" method="POST" action="{{route('roles.update',['id' => $role->id])}}">
              {!! csrf_field() !!}
              {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="form-group">
                  {{Form::label('name', 'สิทธฺ์ใช้งาน', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-4">
                    {{Form::text('name', $role->name,['class'=>'form-control','required'])}}
                    <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('description', 'คำอธิบาย', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-6">
                    {{Form::text('description', $role->description,['class'=>'form-control','required'])}}
                    <span class="help-block text-danger">{{ $errors->first('description') }}</span>
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