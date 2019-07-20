@extends('admin.layouts.master')
@section('title', 'Thêm Slides')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm Slide</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin"><i class="fa fa-home"></i> Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="admin/slides/danhsach">Slides</a></li>
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
            <div class="row">

                <div class="col-sm-12">
                    <form action="admin/slides/them" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title float-left">Thêm Slide</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label for="">Tên Slide</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('name') }}
                                    </div>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Nhập tên slide...">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Hình ảnh slide</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('image') }}
                                    </div>
                                    <p><img src="http://placehold.it/1000x365?text=Slide" class="img-rounded img-thumbnail img-fluid" id="wizardPicturePreview" style="width: 1000px; height: 365px;" alt=""></p>
                                    <input type="file" class="form-control" id="wizard-picture" name="image">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Liên kết</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('url') }}
                                    </div>
                                    <input type="text" class="form-control" name="url" value="{{ old('url') }}" required placeholder="Nhập liên kết...">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Lưu lại</button>
                                <a href="admin/slides/danhsach" class="btn btn-default float-right">Hủy bỏ</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </form>
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