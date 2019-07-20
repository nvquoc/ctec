@extends('layouts.master')
@section('title', $page->name)
@section('content')
    <div class="block-content">

        <!-- Page Header -->
        <div class="page-header">
            <hr>
            <h5 class="page-title">{{ $page->name }}</h5>
            <span class="page-date"><i class="fa fa-calendar"></i> {{ $page->created_at }}</span>
            <hr>
        </div>
        <!-- End Page Header -->

        <!-- post content -->
        <div class="post-content">
            {!! $page->content !!}
        </div>
        <hr>
        <!-- end post content -->

    </div>
@endsection
@section('script')
    
@endsection