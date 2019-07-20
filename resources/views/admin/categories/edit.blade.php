@extends('admin.layouts.master')
@section('title', 'Sửa Loại Tin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sửa Loại Tin</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin"><i class="fa fa-home"></i> Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Loại Tin</li>
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

                <div class="col-sm-4">
                    <form action="admin/loaitin/sua/{{ $category->id }}" method="POST">
                        @csrf
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title float-left">Sửa loại tin</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Tên loại tin</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('name') }}
                                    </div>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $category->name }}" required placeholder="Nhập tên loại tin...">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" name="submit">Lưu lại</button>
                                <a href="admin/loaitin" class="btn btn-default float-right">Hủy bỏ</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </form>
                </div>
                <!-- /.col -->

                <div class="col-sm-8">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title float-left">Danh Sách Loại Tin</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="cat-list" class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên loại tin</th>
                                        <th>Slug</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $stt = 1;
                                    @endphp
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td><a href="admin/loaitin/sua/{{ $category->id }}"><i class="fa fa-edit btn btn-success"></i></a></td>
                                        <td><a href="admin/loaitin/xoa/{{ $category->id }}" onclick="return confirm('Loại tin có {{ count($category->post) }} bài viết!\nXác nhận xóa?');"><i class="fa fa-trash btn btn-danger"></i></a></td>
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
      $('#cat-list').DataTable({
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