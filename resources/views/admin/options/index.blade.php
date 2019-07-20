@extends('admin.layouts.master')
@section('title', 'Cài Đặt Website')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Cài Đặt Website</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin"><i class="fa fa-home"></i> Trang Chủ</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cài Đặt</li>
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
                            <h3 class="card-title float-left">Cài Đặt</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="admin/caidat" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-5">
                                    <label for="">Tiêu đề trang web (site title)</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('site_title') }}
                                    </div>
                                    <input type="text" class="form-control" name="site_title" value="{{ old('site_title') ? old('site_title') : $site_title->value }}" required placeholder="Nhập tiêu đề trang...">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="">Miêu tả trang web (site description)</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('site_description') }}
                                    </div>
                                    <textarea class="form-control" name="site_description" cols="30" rows="3" required placeholder="Nhập miêu tả trang...">{{ old('site_description') ? old('site_description') : $site_description->value }}</textarea>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="">Thông tin footer (footer description)</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('site_footer') }}
                                    </div>
                                    <textarea class="form-control tinymce" name="site_footer" cols="30" rows="10"required placeholder="Nhập thông tin footer...">{{ old('site_footer') ? old('site_footer') : $site_footer->value }}</textarea>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="">Site Icon</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('site_icon') }}
                                    </div>
                                    <p><img src="upload/website/icon/{{ $site_icon->value }}" id="site-icon" alt="" class=" img-circle img-fluid" style="width: 59px; height: 59px;"></p>
                                    <input type="file" class="form-control" id="site-icon-file" name="site_icon">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="">Site Logo</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('site_logo') }}
                                    </div>
                                    <p><img src="upload/website/logo/{{ $site_logo->value }}" id="site-logo" alt="" class=" img-circle img-fluid" style="width: 120px; height: 120px;"></p>
                                    <input type="file" class="form-control" id="site-logo-file" name="site_logo">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="">Site top banner</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('site_banner') }}
                                    </div>
                                    <p><img src="upload/website/banner/{{ $site_banner->value }}" id="site-banner" alt="" class=" img-bordered-sm img-fluid" style="width: 729px; height: 90px;"></p>
                                    <input type="file" class="form-control" id="site-banner-file" name="site_banner">
                                </div>
                                <button type="submit" class="btn btn-info ml-5">Lưu lại</button>
                                <a href="admin/caidat" class="btn btn-default float-right mr-5">Hủy bỏ</a>
                            </form>
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
<!-- page script -->
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
            $("#site-icon-file").change(function () {
                readiconURL(this);
            });
            $("#site-logo-file").change(function () {
                readlogoURL(this);
            });
            $("#site-banner-file").change(function () {
                readbannerURL(this);
            });
        });

        function readiconURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#site-icon').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readlogoURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#site-logo').attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
        }
        function readbannerURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#site-banner').attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
        }

</script>
@endsection