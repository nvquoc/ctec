@extends('layouts.master')
@section('title', $category->name)
@section('content')
    <div class="block-content">

        <!-- Page Header -->
        <div class="page-header">
            <hr>
            <h5 class="page-title">{{ $category->name }}</h5>
            <hr>
        </div>
        <!-- End Page Header -->

        <!-- page content -->
        <div class="page-content">
        
            <!-- post list -->
            @foreach ($posts as $post)
            @php
                $post_des = strip_tags(str_limit($post->content, 250, '...'));
            @endphp
            <div class="list-block">
                <div class="row wow slideInUp">
                    <div class="col-sm-3">
                        <a href="baiviet/{{ $post->slug }}.html">
                            <img class="img-fluid"
                                src="upload/images/baiviet/{{ $post->image }}"
                                alt="">
                        </a>
                    </div>
                    <div class="col-sm-9">
                        <h6 class="title">
                            <a href="baiviet/{{ $post->slug }}.html">
                                {{ $post->title }}
                            </a>
                        </h6>
                        <span>
                            {!! $post_des !!}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- end post list -->
        
        </div>
        <!-- end page content -->

        <!-- pagination -->
        <div class="page-pagination text-center">
            {{ $posts->links() }}
        </div>
        <hr>
        <!-- end pagination -->

    </div>
@endsection
@section('script')
    
@endsection