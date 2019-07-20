@extends('admin.layouts.master')
@section('title', 'Danh Sách Trang')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh Sách Trang</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i> Trang Chủ</a>
                            </li>
                            <li class="breadcrumb-item"><a href="admin/trang/danhsach">Trang</a></li>
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
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title float-left">Danh Sách Trang</h3>
                            @if (Auth::user()->rule == 1)
                                <a class="btn btn-primary float-right" href="admin/trang/them"><i class="fa fa-plus-circle"></i> Thêm</a>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="page-list" class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên trang</th>
                                        <th>slug</th>
                                        <th>Trạng thái</th>
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
                                    @foreach ($pages as $page)
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td><a href="trang/{{ $page->slug }}" target="_blank">{{ $page->name }}</a></td>
                                        <td>{{ $page->slug }}</td>
                                        <td>
                                            @if ($page->status == 0)
                                                <span class="badge btn btn-secondary">Lưu Nháp</span>
                                            @else
                                                <span class="badge btn btn-primary">Xuất Bản</span>
                                            @endif
                                        </td>
                                        @if (Auth::user()->rule == 1)
                                        <td><a href="admin/trang/sua/{{ $page->id }}"><i class="fa fa-edit btn btn-success"></i></a></td>
                                        <td><a href="admin/trang/xoa/{{ $page->id }}" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash btn btn-danger"></i></a></td>
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
            $('#page-list').DataTable({
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