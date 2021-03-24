
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
@include('admin.layout.header')
@yield('head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('admin.layout.navbar')

@include('admin.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('main-content')
  </div>
  <!-- /.content-wrapper -->


  @include('admin.layout.footer')
</div>
<!-- ./wrapper -->

@include('admin.layout.script')
@section('script')

@show
</body>
</html>
