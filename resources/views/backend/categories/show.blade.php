@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        รายละเอียดหมวดหมู่
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
        <li><a href="{{route('category.index')}}"><i class="fa fa-list"></i>หมวดหมู่</a></li>
        <li class="active">แสดง</li>
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
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">หัวข้อ</label>
                  <div class="col-sm-6">
                    <p class="form-control-static">{{ @$category->name}}</p>
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