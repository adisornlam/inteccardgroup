@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มข้อมูลข่าวสาร
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
      <li><a href="{{route('news.index')}}"><i class="fa fa-list"></i>ข้อมูลข่าวสาร</a></li>
        <li class="active">เพิ่มรายการ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              {{-- <h3 class="box-title">Horizontal Form</h3> --}}
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  {{Form::label('category', 'หมวดหมู่', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-4">
                      {{Form::select('categories_id',$categories,null,['class'=>'form-control'])}}
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('name', 'หัวข้อ', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                    <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('image', 'รูปปก', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-3">
                    <input type="file" name="image" required>
                    <p class="help-block">ขนาดที่เหมาะสม 250px * 170px</p>
                    <span class="help-block text-danger">{{ $errors->first('image') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('file', 'ไฟล์แนบ', array('class' => 'col-sm-2 control-label'))}}
                  <div class="col-sm-3">
                    <input type="file" name="attachment">
                    <p class="help-block">ไฟล์ที่เหมาะสม pdf, word, excel</p>
                    <span class="help-block text-danger">{{ $errors->first('attachment') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  {{Form::label('link', 'Link', array('class' => 'col-sm-2 control-label'))}}
                  <div class="col-sm-6">
                    <input type="text" name="link" class="form-control" id="link" placeholder="http://" value="{{ old('link') }}">
                    <span class="help-block text-danger">{{ $errors->first('link') }}</span>
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