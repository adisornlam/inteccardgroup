@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        แก้ไขรูปภาพสไลด์
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
      <li><a href="{{route('photoslide.index')}}"><i class="fa fa-list"></i>รูปภาพสไลด์</a></li>
        <li class="active">แก้ไขรายการ</li>
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
            <form class="form-horizontal" method="POST" action="{{route('photoslide.update',['id' => $photoslide->id])}}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="form-group">
                  {{Form::label('name', 'หัวข้อ', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-4">
                    {{Form::text('name', $photoslide->name,['class'=>'form-control','required'=>'required'])}}
                    <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('description', 'รายละเอียด', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-6">
                    {{Form::text('description', $photoslide->description,['class'=>'form-control','required'=>'required'])}}
                    <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('link', 'Link', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-6">
                    {{Form::text('link', $photoslide->link,['class'=>'form-control','required'=>'required'])}}
                    <span class="help-block text-danger">{{ $errors->first('link') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('showphoto', '&nbsp;', array('class' => 'col-sm-2 control-label'))}}
                  <div class="col-sm-3">
                    <img src="{{$photoslide->photo}}" height="300" />
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('photo', 'รูปภาพ', array('class' => 'col-sm-2 control-label'))}}
                  <div class="col-sm-3">
                    {{Form::file('photo')}}
                    <p class="help-block">ขนาดที่เหมาะสม 1600px * 800px</p>
                    <span class="help-block text-danger">{{ $errors->first('photo') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        {{ Form::checkbox('active', '1', ($photoslide->active===1 ?true:false)) }} เปิดใช้งาน
                      </label>
                    </div>
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