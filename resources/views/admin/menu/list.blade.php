@extends('admin.layouts.master')
@section('title', 'Chỉnh Sửa Menu')
@section('style')
<link rel="stylesheet" href="assets/plugins/nestable2/jquery.nestable.css">
<link rel="stylesheet" href="assets/plugins/nestable2/theme.css">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin"><i class="fa fa-home"></i> Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu</li>
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
                    <form action="admin/menu" method="POST">
                        @csrf
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title float-left">Thêm Liên Kết</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Tên liên kết</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('label') }}
                                    </div>
                                    <input type="text" class="form-control" name="label" value="{{ old('label') }}" required placeholder="Nhập tên liên kết...">
                                </div>
                                <div class="form-group">
                                    <label for="">Liên kết</label>
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('url') }}
                                    </div>
                                    <input type="text" class="form-control" name="url" value="{{ old('url') }}" required placeholder="Nhập liên kết https://...">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Lưu lại</button>
                                <button type="reset" class="btn btn-default float-right">Hủy bỏ</button>
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
                            <h3 class="card-title float-left">Chỉnh Sửa Menu</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="cf nestable-lists">                            
                                <div class="dd" id="menu">
                                    <ol class="dd-list">
                                        @foreach ($menus as $menu)
                                        <li class="dd-item dd3-item" data-id="{{ $menu->id }}">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">
                                                <span>{{ $menu->label }}</span>
                                                <span class="mr5 ml-5"><a href="{{ $menu->url }}" target="_blank">{{ $menu->url }}</a></span>
                                                <span class="float-right mr-2 ml-2"><a href="admin/menu/xoa/{{ $menu->id }}" onclick="return confirm('Xóa liên kết sẽ xóa luôn các liên kết con!\nXác nhận xóa?');"><i class="fa fa-trash text-danger"></i></a></span>
                                                <span class="float-right mr-2 ml-2">|</span>
                                                <span class="float-right mr-2 ml-2"><a href="admin/menu/sua/{{ $menu->id }}"><i class="fa fa-edit text-success"></i></a></span>
                                            </div>
                                            @if (count($menu->children) > 0)
                                            <ol class="dd-list">
                                                @foreach ($menu->children as $sub)
                                                <li class="dd-item dd3-item" data-id="{{ $sub->id }}">
                                                    <div class="dd-handle dd3-handle"></div>
                                                    <div class="dd3-content">
                                                        {{ $sub->label }}
                                                        <span class="mr5 ml-5"><a href="{{ $sub->url }}" target="_blank">{{ $sub->url }}</a></span>
                                                        <span class="float-right mr-2 ml-2"><a href="admin/menu/xoa/{{ $sub->id }}"><i class="fa fa-trash text-danger" onclick="return confirm('Xác nhận xóa?');"></i></a></span>
                                                        <span class="float-right mr-2 ml-2">|</span>
                                                        <span class="float-right mr-2 ml-2"><a href="admin/menu/sua/{{ $sub->id }}"><i class="fa fa-edit text-success"></i></a></span>
                                                    </div>
                                                    @if (count($sub->children))
                                                    <ol class="dd-list">
                                                        @foreach ($sub->children as $s)
                                                        <li class="dd-item dd3-item" data-id="{{ $s->id }}">
                                                            <div class="dd-handle dd3-handle"></div>
                                                            <div class="dd3-content">
                                                                {{ $s->label }}
                                                                <span class="mr5 ml-5"><a href="{{ $s->url }}" target="_blank">{{ $s->url }}</a></span>
                                                                <span class="float-right mr-2 ml-2"><a href="admin/menu/xoa/{{ $s->id }}" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash text-danger"></i></a></span>
                                                                <span class="float-right mr-2 ml-2">|</span>
                                                                <span class="float-right mr-2 ml-2"><a href="admin/menu/sua/{{ $s->id }}"><i class="fa fa-edit text-success"></i></a></span>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ol>
                                                    @endif
                                                </li>
                                                @endforeach
                                            </ol>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <input type="hidden" id="nestable-output">
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
<!-- Nestable file -->
<script src="assets/plugins/nestable2/jquery.nestable.js"></script>
<!-- Nestable data-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        var updateOutput = function(e)
        {
            var list   = e.length ? e : $(e.target), output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        // activate Nestable for list
        $('#menu').nestable({
            maxDepth: 3
        })
        .on('change', updateOutput);

        // output initial serialised data
        updateOutput($('#menu').data('output', $('#nestable-output')));

        $('.dd').on('change', function() {
            var dataString = {
                data : $("#nestable-output").val(),
        };
        
            $.ajax({
                url: "admin/menu/update",
                type: "POST",
                dataType: "json",
                data: dataString,
                success: function(data){
                    // alert(data.success);
                },
                error: function(xhr, status, error){
                    alert(error);
                },
            });
        });
    });
</script>
@endsection