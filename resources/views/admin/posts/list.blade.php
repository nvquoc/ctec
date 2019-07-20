@extends('admin.layouts.master')
@section('title', 'Danh Sách Bài Viết')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh Sách Bài Viết</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin"><i class="fa fa-home"></i> Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="admin/baiviet/danhsach">Bài Viết</a></li>
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
                            <h3 class="card-title float-left">Danh Sách Bài Viết</h3>
                            <a class="btn btn-primary float-right" href="admin/baiviet/them"><i class="fa fa-plus-circle"></i> Thêm</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="post-list" class="table table-bordered table-responsive text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tiêu đề bài viết</th>
                                        <th>Tên tác giả</th>
                                        <th>Loại tin</th>
                                        <th>Nổi bật</th>
                                        <th>Trạng thái</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $stt }}</td>
                                            <td>
                                                <img src="upload/images/baiviet/{{ $post->image }}" class="img-fluid" style="width: 175px; height: 100px;" alt="">
                                            </td>
                                            <td><a href="baiviet/{{ $post->slug }}.html" target="_blank">{{ $post->title }}</a></td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>
                                                @if ($post->is_hot == 0)
                                                    <span class="badge btn btn-outline-info">Không</span>
                                                @else
                                                    <span class="badge btn btn-outline-warning">Nổi Bật</span>
                                                @endif                        
                                            </td>
                                            <td>
                                                @if ($post->status == 0)
                                                    <span class="badge btn btn-secondary">Lưu Nháp</span>
                                                @else
                                                    <span class="badge btn btn-primary">Xuất Bản</span>
                                                @endif
                                            </td>
                                            @if (Auth::user()->rule == 1)
                                            <td><a href="admin/baiviet/sua/{{ $post->id }}"><i class="fa fa-edit btn btn-success"></i></a></td>
                                            <td><a href="admin/baiviet/xoa/{{ $post->id }}" onclick="return confirm('Xác nhận xóa bài viết này?');"><i class="fa fa-trash btn btn-danger"></i></a></td>
                                            @else
                                                @if ($post->user->id == Auth::user()->id)
                                                    <td><a href="admin/baiviet/sua/{{ $post->id }}"><i class="fa fa-edit btn btn-success"></i></a></td>
                                                    <td><a href="admin/baiviet/xoa/{{ $post->id }}"><i class="fa fa-trash btn btn-danger" onclick="return confirm('Xác nhận xóa bài viết này?');"></i></a></td>
                                                @else
                                                    <td><i class="fa fa-edit btn btn-default text-muted"></i></td>
                                                    <td><i class="fa fa-trash btn btn-default text-muted"></i></td>
                                                @endif
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
      $('#post-list').DataTable({
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