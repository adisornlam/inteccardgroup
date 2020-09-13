@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        รายละเอียดข้อมูลข่าวสาร
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
      <li><a href="{{route('news.index')}}"><i class="fa fa-list"></i>ข้อมูลข่าวสาร</a></li>
        <li class="active">รายละเอียด</li>
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
            <form class="form-horizontal">
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">หัวข้อ</label>
                  <div class="col-sm-6">
                      <p class="form-control-static">{{ @$news->name}}</p>
                  </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">หมวดหมู่</label>
                    <div class="col-sm-4">
                        <p class="form-control-static">{{ @$news->categories->name}}</p>
                    </div>
                </div>
                <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">ภาพปก</label>
                  <div class="col-sm-3">
                    <img src="{{$news->image}}" height="170" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ไฟล์แนบ</label>
                  <div class="col-sm-3">
                      <p class="form-control-static"><a href="{{ @$news->attachment}}" target="_blank">เปิดดูไฟล์</a></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Link</label>
                  <div class="col-sm-6">
                      <p class="form-control-static"><a href="{{ @$news->link}}" target="_blank">เปิดดูลิงค์</a></p>
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">สถานะ</label>
                    <div class="col-sm-6">
                        @if($news->active === 1)
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