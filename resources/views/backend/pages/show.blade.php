@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        แสดงเนื้อหาเดี่ยว
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
      <li><a href="{{route('pages.index')}}"><i class="fa fa-list"></i>เนื้อหาเดี่ยว</a></li>
        <li class="active">แสดงรายการ</li>
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
            <form class="form-horizontal">
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  {{Form::label('name', 'หัวข้อ', array('class' => 'col-sm-2 control-label required'))}}
                  <div class="col-sm-6">
                    <p class="form-control-static">{{ @$page->name}}</p>
                  </div>
                </div>
                <div class="form-group">
                    {{Form::label('long_desc', 'รายละเอียด', array('class' => 'col-sm-2 control-label required'))}}
                    <div class="col-sm-10">
                      {!!$page->long_desc!!}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">สถานะ</label>
                    <div class="col-sm-6">
                        @if($page->active === 1)
                        <span class="badge bg-green">เปิด</span>
                        @else
                        <span class="badge bg-yellow">ปิด</span>
                        @endif
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection