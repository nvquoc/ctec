@extends('admin.layouts.master')
@section('title', 'File Manager')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">File Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="admin"><i class="fa fa-home"></i> Trang Chủ</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">FileManager</li>
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
            <iframe src="filemanager/dialog.php?type=1&field_id=fieldID&akey=bb3591c728b7128cedbfea87f729acf7" frameborder="0" style="width: 100%;height: 100vh"></iframe>
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection