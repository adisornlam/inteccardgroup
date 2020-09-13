@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มเนื้อหาเดี่ยว
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
      <li><a href="{{route('pages.index')}}"><i class="fa fa-list"></i>เนื้อหาเดี่ยว</a></li>
        <li class="active">เพิ่มรายการ</li>
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
            <form class="form-horizontal" method="POST" action="{{route('pages.store')}}">
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  {{Form::label('name', 'หัวข้อ', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-6">
                    {{Form::text('name', old('name'),['class'=>'form-control','required'])}}
                    <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('slug', 'ชื่อย่อ(ภาษาอังกฤษ)', array('class' => 'col-sm-2 control-label'))}}
                  <div class="col-sm-4">
                    {{Form::text('slug', old('slug'),['class'=>'form-control'])}}
                    <span class="help-block text-danger">{{ $errors->first('slug') }}</span>
                  </div>
                </div>
                <div class="form-group">
                    {{Form::label('long_desc', 'รายละเอียด', array('class' => 'col-sm-2 control-label required'))}}
                    <div class="col-sm-10">
                      <textarea id="long_desc" name="long_desc" rows="10" cols="80">{{ old('long_desc') }}</textarea>
                    </div>
                  </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="active" value="1" checked> เปิดใช้งาน
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
  @section('scripts')
  <!-- CK Editor -->
  <script src="{{ asset("inteccardgroup/bower_components/ckeditor/ckeditor.js")}}"></script>
@endsection
@section('script')
  <script>
    $(function () {
      CKEDITOR.replace('long_desc', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        allowedContent:true,
      });
    })
  </script>
@endsection