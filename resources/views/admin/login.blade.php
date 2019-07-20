<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('') }}">

    <title>Đăng Nhập - CTEC SYSTEM</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>CTEC</b> <i class="text-danger">SYSTEM</i></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <form action="admin/dangnhap" method="POST">
                    @csrf
                    <div class="form-group has-feedback">
                        <label for="email">Địa chỉ email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Nhập địa chỉ email...">
                        <!-- <span class="fa fa-envelope form-control-feedback"></span> -->
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" required placeholder="Nhập mật khẩu...">
                        <!-- <span class="fa fa-lock form-control-feedback"></span> -->
                    </div>
                    @if (session('thongbao'))
                        <div class="text-danger text-center mb-2">
                            {{ session('thongbao') }}
                        </div>
                    @endif
                    <div class="text-center mt-4 mb-4">
                        <button type="submit" class="btn btn-block btn-flat btn-primary">Đăng Nhập</button>
                    </div>
                </form>
                <p class="mb-1">
                    <a href="#">Quên mật khẩu ?</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>

        <div class="text-center">
            <p>Website thiết kế bởi sinh viên CTEC</p>
        </div>

    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>