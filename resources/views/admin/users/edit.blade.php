@extends('admin.layouts.master')
@section('title', 'Sửa Người Dùng')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sửa Người Dùng</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin"><i class="fa fa-home"></i> Trang Chủ</a>
                            </li>
                            <li class="breadcrumb-item"><a href="admin/nguoidung/danhsach">Người Dùng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm</li>
                        </ol>
                    </nav>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="admin/nguoidung/sua/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-5">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title float-left">Thông Tin</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group text-center mb-4">
                                    <label for="">Ảnh đại diện</label>
                                    <p><img src="upload/website/avatar/{{ $user->avatar }}"
                                            class="img-circle img-thumbnail img-fluid" id="wizardPicturePreview"style="width: 200px; height: 200px;" alt=""></p>
                                    <input type="file" class="form-control" id="wizard-picture" name="avatar">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="">Họ và tên</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('name') }}
                                    </div>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}" required placeholder="Nhập họ và tên người dùng...">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-7">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title float-left">Tài Khoản</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label for="">Quyền</label>
                                    <select class="form-control" name="rule">
                                        <option value="0" {{ old('rule', $user->rule) == 0 ? 'selected' : '' }}>Thành viên</option>
                                        <option value="1" {{ old('rule', $user->rule) == 1 ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Địa chỉ email</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('email') }}
                                    </div>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}" required placeholder="Nhập địa chỉ email...">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Mật khẩu ( <span class="text-danger">Để trống nếu không thay đổi</span> )</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('password') }}
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu...">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Nhập lại mật khẩu</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('passwordAgain') }}
                                    </div>
                                    <input type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại mật khẩu...">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info ml-4">Lưu lại</button>
                                <a href="admin/nguoidung/danhsach" class="btn btn-secondary float-right mr-4">Hủy bỏ</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
    
                </div>
                <!-- /.row -->
            </form>
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection
@section('script')
<!-- wizardPicturePreview -->
<script>
    $(document).ready(function () {
            $("#wizard-picture").change(function () {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
@endsection