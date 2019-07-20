@extends('admin.layouts.master')
@section('title', 'Danh sách người dùng')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh Sách Người Dùng</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin"><i class="fa fa-home"></i> Trang Chủ</a>
                            </li>
                            <li class="breadcrumb-item"><a href="admin/nguoidung/danhsach">Người Dùng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh Sách</li>
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title float-left">Danh Sách Người Dùng</h3>
                            @if (Auth::user()->rule == 1)
                                <a class="btn btn-primary float-right" href="admin/nguoidung/them"><i class="fa fa-plus-circle"></i> Thêm</a>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="user-list" class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Avatar</th>
                                        <th>Tên Người Dùng</th>
                                        <th>Email</th>
                                        <th>Quyền</th>
                                        @if (Auth::user()->rule == 1)
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>
                                            <img class="img-circle img-fluid" src="upload/website/avatar/{{ $user->avatar }}" alt=""
                                                width="75px" height="75px">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->rule == 0)
                                                <span class="badge btn btn-outline-dark">Thành Viên</span>
                                            @else
                                                <span class="badge btn btn-outline-warning">Admin</span>
                                            @endif
                                        </td>
                                        @if (Auth::user()->rule ==1)
                                        <td><a href="admin/nguoidung/sua/{{ $user->id }}"><i class="fa fa-edit btn btn-success"></i></a></td>
                                        <td><a href="admin/nguoidung/xoa/{{ $user->id }}" onclick="return confirm('Người dùng có {{ count($user->post) }} bài viết!\nXác nhận xóa?');"><i class="fa fa-trash btn btn-danger"></i></a></td>
                                        @endif
                                    </tr>
                                    @php
                                        $stt++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
            $('#user-list').DataTable({
                "language": {
                    "sProcessing": "Đang xử lý...",
                    "sLengthMenu": "Xem _MENU_ mục",
                    "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                    "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix": "",
                    "sSearch": "Tìm:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Đầu",
                        "sPrevious": "Trước",
                        "sNext": "Tiếp",
                        "sLast": "Cuối"
                    }
                }
            });
        });
</script>
@endsection