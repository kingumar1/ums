@extends('layouts.base')
@section('title', 'All Posts')
@section('base-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">{{$post->title}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
