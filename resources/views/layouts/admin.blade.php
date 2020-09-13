<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  @include('backend.include.head')
</head>
<body class="hold-transition layout-boxed skin-blue-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('backend.include.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('backend.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('backend.include.footer')

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset("inteccardgroup/bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("inteccardgroup/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("inteccardgroup/bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>

@yield('scripts')
@yield('script')
</body>
</html>