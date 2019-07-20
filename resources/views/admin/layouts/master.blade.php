<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="upload/images/icon/favicon.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <base href="{{ asset('') }}">

  <title>@yield('title') - CTEC SYSTEM</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('style')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    @include('admin.layouts.header')

    @include('admin.layouts.menu')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    
    <!-- Main Footer -->
    @include('admin.layouts.footer')
    </div>
    <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI-->
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="assets/plugins/datatables/jquery.dataTables.js"></script>
  <script src="assets/plugins/datatables/dataTables.bootstrap4.js"></script>
  <!-- tinyMCE -->
  <script src="assets/plugins/tinymce/tinymce.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
  <!-- Get session('thongbao') -->
  <script>
    $(document).ready(function(){
      var msg = '{{Session::get('thongbao')}}';
      var exist = '{{Session::has('thongbao')}}';
      if(exist){
        alert(msg);
      }
    });
  </script>
  <!-- page script -->
  @yield('script')
</body>

</html>