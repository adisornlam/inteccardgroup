@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        บทความ
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-dashboard"></i> แผงควบคุม</a></li>
        <li class="active">บทความ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">รายการบทความ</h3>
                  <div class="box-tools">
                    <a href="{{route('contents.create')}}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการ</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>หัวข้อ</th>
                      <th>หมวดหมู่</th>
                      <th>สถานะ</th>
                      <th style="width: 200px">Action</th>
                    </tr>
                    @foreach ($contents as $content)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $content->name}}</td>
                      <td>{{ $content->categories->name}}</td>
                      <td>
                        @if($content->active === 1)
                        <span class="badge bg-green">เปิด</span>
                        @else
                        <span class="badge bg-yellow">ปิด</span>
                        @endif
                      </td>
                      <td>
                          @if(($content->created_user_id==Auth::user()->id) OR ($authcheck))
                            <a class="btn btn-primary" href="{{ route('contents.edit',$content->id) }}">แก้ไข</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['contents.destroy', $content->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                          @endif
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $contents->render() !!}
                </div>
              </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection