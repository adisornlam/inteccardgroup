@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    @if(session()->get('success'))
      <div class="callout callout-success">
          <h4>{{ session()->get('success') }}</h4>
      </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        หมวดหมู่
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
        <li class="active">หมวดหมู่</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">รายการหมวดหมู่</h3>
                  <div class="box-tools">
                    <a href="{{route('category.create')}}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการ</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>หัวข้อ</th>
                      <th style="width: 200px">Action</th>
                    </tr>
                    @foreach ($categories as $category)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $category->name}}</td>
                      <td>
                          <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">แสดง</a>
                          <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">แก้ไข</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $category->id],'style'=>'display:inline']) !!}
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">
                          {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $categories->render() !!}
                </div>
              </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection