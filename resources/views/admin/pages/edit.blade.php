@extends('admin.layouts.master')
@section('title', 'Sửa Trang')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sửa Trang</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin"><i class="fa fa-home"></i> Trang Chủ</a>
                            </li>
                            <li class="breadcrumb-item"><a href="admin/trang/danhsach">Trang</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa</li>
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
            <form action="admin/trang/sua/{{ $page->id }}" method="POST">
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
                                    <label for="">Tên trang</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('name') }}
                                    </div>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') ? old('name') : $page->name }}" required placeholder="Nhập tên trang...">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="">Nội dung trang</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('content') }}
                                    </div>
                                    <textarea class="form-control tinymce" name="content" cols="30" rows="30">{{ old('content') ? old('content') : $page->content }}</textarea>
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
                                    <label for="">Trạng Thái</label>
                                    <select class="form-control" name="status">
                                        <option value="0" {{ old('status', $page->status) == 0 ? 'selected' : '' }}>Lưu Nháp</option>
                                        <option value="1" {{ old('status', $page->status) == 1 ? 'selected' : '' }}>Xuất Bản</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Lưu lại</button>
                                <a class="btn btn-default float-right" href="admin/trang/danhsach">Hủy bỏ</a>
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
<!-- tinyMCE script -->
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
@endsection