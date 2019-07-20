@extends('admin.layouts.master')
@section('title', 'Thêm Bài Viết Mới')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm Bài Viết</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin"><i class="fa fa-home"></i> Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="admin/baiviet/danhsach">Bài Viết</a></li>
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
            <form action="admin/baiviet/them" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title float-left">Nội Dung</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group mb-5">
                                    <label for="">Tiêu đề bài viết</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('title') }}
                                    </div>
                                    <input class="form-control" type="text" name="title" value="{{ old('title') }}" required placeholder="Nhập tiêu đề bài viết...">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="">Nội dung bài viết</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('content') }}
                                    </div>
                                    <textarea class="form-control tinymce" name="content" cols="30" rows="30">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-sm-3">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title float-left">Tùy Chọn</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label for="">Loại Tin</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('category_id') }}
                                    </div>
                                    <select required class="form-control" name="category_id">
                                        <option value="">-- Chọn Loại Tin --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id)) {{ "selected" }} @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Trạng Thái</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('status') }}
                                    </div>
                                    <select class="form-control" name="status">
                                        <option value="0" @if (old('status') == 0) {{ "selected" }} @endif>Lưu Nháp</option>
                                        <option value="1" @if (old('status') == 1) {{ "selected" }} @endif>Xuất Bản</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Tin Nổi Bật</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('is_hot') }}
                                    </div>
                                    <select class="form-control" name="is_hot">
                                        <option value="0" @if (old('is_hot') == 0) {{ "selected" }} @endif>Không</option>
                                        <option value="1" @if (old('is_hot') == 1) {{ "selected" }} @endif>Có</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="">Hình ảnh</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('image') }}
                                    </div>
                                    <img class="img-rounded img-fluid mb-3" src="http://placehold.it/300x300?text=Image" id="wizardPicturePreview" alt="" style="width: 300px; height: 300px;">
                                    <input class="form-control" type="file" name="image" id="wizard-picture">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Lưu lại</button>
                                <a class="btn btn-default float-right" href="admin/baiviet/danhsach">Hủy bỏ</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection
@section('script')
<script>
    tinymce.init({

    editor_selector: "tinymce",

    selector: '.tinymce',

    relative_urls: false,

    remove_script_host: false,

    plugins: [

      'advlist autolink lists link image charmap print preview hr anchor pagebreak',

      'searchreplace wordcount visualblocks visualchars code fullscreen',

      'insertdatetime media nonbreaking save table contextmenu directionality',

      'emoticons paste textcolor colorpicker textpattern imagetools'

    ],

    toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

    toolbar2: 'print preview media | forecolor backcolor emoticons',

    image_advtab: true,

    external_filemanager_path: "{{ asset('') }}/filemanager/",

    filemanager_title: "Responsive Filemanager",
    filemanager_access_key:"bb3591c728b7128cedbfea87f729acf7",

    external_plugins: { 
      "responsivefilemanager": "{{ asset('') }}/assets/plugins/tinymce/plugins/responsivefilemanager/plugin.min.js",
      "filemanager": "{{ asset('') }}/filemanager/plugin.min.js",
    }
  });

</script>
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