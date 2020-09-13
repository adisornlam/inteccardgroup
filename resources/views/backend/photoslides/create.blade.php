@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เพิ่มรูปภาพสไลด์
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
      <li><a href="{{route('photoslide.index')}}"><i class="fa fa-list"></i>รูปภาพสไลด์</a></li>
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
            <form class="form-horizontal" method="POST" action="{{route('photoslide.store')}}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">หัวข้อ <span style="color:red;">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                    <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">รายละเอียด <span style="color:red;">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="description" class="form-control" id="description" value="{{ old('description') }}" required>
                    <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Link <span style="color:red;">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="link" class="form-control" id="link" placeholder="http://" value="{{ old('link') }}" required>
                    <span class="help-block text-danger">{{ $errors->first('link') }}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">รูปภาพ <span style="color:red;">*</span></label>
                  <div class="col-sm-3">
                    <input type="file" name="photo" required>
                    <p class="help-block">ขนาดที่เหมาะสม 1600px * 800px</p>
                    <span class="help-block text-danger">{{ $errors->first('photo') }}</span>
                  </div>
                </div>
                {{-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Link <span style="color:red;">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="link" class="form-control" id="link" placeholder="http://" value="{{ old('link') }}" required>
                    <span class="help-block text-danger">{{ $errors->first('link') }}</span>
                  </div>
                </div> --}}
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