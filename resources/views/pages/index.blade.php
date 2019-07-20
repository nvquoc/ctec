@extends('layouts.master')
@section('title', 'Trang Chủ')
@section('content')
    <!-- Block content -->
    <div class="block-content">

        <!-- header title -->
        <div class="header-title">
            <span class="h-title">
                <i class="fa fa-newspaper-o"></i>
                <a href="loaitin/tin-tuc-su-kien"> Tin Tức Sự Kiện</a>
            </span>
            <span class="h-title read-more d-none d-sm-block">
                <a href="loaitin/tin-tuc-su-kien"> Xem Thêm <i class="fa fa-chevron-circle-right"></i></a>
            </span>
        </div>
        <!-- End Header title -->

        <!-- Block listing -->
        <div class="row block-listing bdb">

            <!-- Post large -->
            @foreach ($cat_ttsk->post->where('status', 1)->sortByDesc('id')->take(1) as $post_lg)
            @php
                $post_des = strip_tags(str_limit($post_lg->content, 250,'...'));
            @endphp
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 post-lg bdr">
                <a href="baiviet/{{ $post_lg->slug }}.html">
                    <img class="img-fluid wow zoomIn" src="upload/images/baiviet/{{ $post_lg->image }}" alt="">
                </a>
                <span class="title">
                    <a href="baiviet/{{ $post_lg->slug }}.html">{{ $post_lg->title }}</a>
                </span>
                <p class="p-des">
                    {!! $post_des !!}
                </p>
            </div>
            @endforeach
            <!-- End Post Large -->

            <!-- Post vertical -->
            <div class="col-12 col-md-12 col-lg-6 post-vertical">
                @foreach ($cat_ttsk->post->where('status', 1)->sortByDesc('id')->slice(1)->take(4) as $post_vt)
                <!-- Listing post -->
                <div class="row sm-listing wow slideInUp">
                    <div class="col-5 col-md-4 col-lg-4 sm-thumbnail">
                        <img class="img-fluid" src="upload/images/baiviet/{{ $post_vt->image }}" alt="">
                    </div>
                    <div class="col-7 col-md-8 col-lg-8 sm-title">
                        <span class="title">
                            <a href="baiviet/{{ $post_vt->slug }}.html">{{ $post_vt->title }}</a>
                        </span>
                    </div>
                </div>
                <hr>
                <!-- End Listing Post -->
                @endforeach
            </div>
            <!-- End Post Vertical -->
        </div>
        <!-- End Block Listing -->

        <!-- header title -->
        <div class="header-title">
            <span class="h-title">
                <i class="fa fa-bullhorn"></i>
                <a href="loaitin/thong-bao"> Thông Báo</a>
            </span>
            <span class="h-title read-more d-none d-sm-block">
                <i class="fa fa-chevron-circle-right"></i>
                <a href="loaitin/thong-bao"> Xem Thêm </i></a>
            </span>
        </div>
        <!-- End Header title -->

        <!-- Block listing -->
        <div id="post-slide" class="carousel slide" data-ride="carousel">
        
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active wow slideInRight">
                    <div class="row block-listing">
                    <!-- Post Inline -->
                    <div class="col-md-12 col-lg-12">
                        <div class="row post-inline">
                            @foreach ($cat_tb->post->where('status', 1)->sortByDesc('id')->take(4) as $post_slide)
                            <div class="col-6 col-md-6 col-lg-3">
                                <img class="img-fluid"
                                    src="upload/images/baiviet/{{ $post_slide->image }}" alt="">
                                <span class="title">
                                    <a href="#">{{ $post_slide->title }}</a>
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Post Inline -->
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row block-listing">
                    <!-- Post Inline -->
                    <div class="col-md-12 col-lg-12">
                        <div class="row post-inline">
                            @foreach ($cat_tb->post->where('status', 1)->sortByDesc('id')->slice(4)->take(4) as $post_slide)
                            <div class="col-6 col-md-6 col-lg-3">
                                <img class="img-fluid"
                                    src="upload/images/baiviet/{{ $post_slide->image }}" alt="">
                                <span class="title">
                                    <a href="baiviet/{{ $post_slide->slug }}.html">{{ $post_slide->title }}</a>
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Post Inline -->
                    </div>
                </div>
            </div>
        
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#post-slide" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#post-slide" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        
        </div>
        <hr>
        <!-- End Block Listing -->

        <!-- header title -->
        <div class="header-title">
            <span class="h-title">
                <i class="fa fa-graduation-cap"></i>
                <a href="loaitin/tin-tuyen-sinh"> Tin Tuyển Sinh</a>
            </span>
            <span class="h-title read-more d-none d-sm-block">
                <a href="loaitin/tin-tuyen-sinh"> Xem Thêm <i class="fa fa-chevron-circle-right"></i></a>
            </span>
        </div>
        <!-- End Header title -->

        <!-- Block listing -->
        <div class="row block-listing bdb">
            <!-- Post large -->
            @foreach ($cat_tts->post->where('status', 1)->sortByDesc('id')->take(1) as $post_lg)
            @php
                $post_des = strip_tags(str_limit($post_lg->content, 250,'...'));
            @endphp
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 post-lg bdr">
                <a href="baiviet/{{ $post_lg->slug }}.html">
                    <img class="img-fluid wow zoomIn" src="upload/images/baiviet/{{ $post_lg->image }}" alt="">
                </a>
                <span class="title">
                    <a href="baiviet/{{ $post_lg->slug }}.html">{{ $post_lg->title }}</a>
                </span>
                <p class="p-des">
                    {!! $post_des !!}
                </p>
            </div>
            @endforeach
            <!-- End Post Large -->

            <!-- Post vertical -->
            <div class="col-12 col-md-12 col-lg-6 post-vertical">
                <!-- Listing post -->
                @foreach ($cat_tts->post->where('status', 1)->sortByDesc('id')->slice(1)->take(4) as $post_vt)
                <div class="row sm-listing wow slideInUp">
                    <div class="col-5 col-md-4 col-lg-4 sm-thumbnail">
                        <img class="img-fluid" src="upload/images/baiviet/{{ $post_vt->image }}" alt="">
                    </div>
                    <div class="col-7 col-md-8 col-lg-8 sm-title">
                        <span class="title">
                            <a href="baiviet/{{ $post_vt->slug }}.html">{{ $post_vt->title }}</a>
                        </span>
                    </div>
                </div>
                <hr>
                @endforeach
                <!-- End Listing Post -->
            </div>
            <!-- End Post Vertical -->
        </div>
        <!-- End Block Listing -->

    </div>
    <!-- End Block content -->
@endsection
@section('script')
    
@endsection