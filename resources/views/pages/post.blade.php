@extends('layouts.master')
@section('title', $post->title)
@section('content')
    <div class="block-content">

        <!-- Page Header -->
        <div class="page-header">
            <hr>
            <h5 class="page-title">{{ $post->title }}</h5>
            <span class="page-date"><i class="fa fa-calendar"></i> {{ $post->created_at }}</span>
            <hr>
        </div>
        <!-- End Page Header -->

        <!-- post content -->
        <div class="post-content">
            {!! $post->content !!}
        </div>
        <hr>
        <!-- end post content -->

        <div class="post-related">
            <span>Các tin liên quan:</span>
            <div class="related-link title">
                <ul>
                @foreach ($posts_rl as $post_rl)
                    <li class="wow slideInUp">
                        <a href="baiviet/{{ $post_rl->slug }}.html">{{ $post_rl->title }}</a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
@section('script')
    
@endsection