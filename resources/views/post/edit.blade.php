@extends('layouts.base')
@section('title', 'New Post')
@section('base-content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Update Post</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('posts.update',$post->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="input-group m-b-30">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Title</span>
                            </div>
                            <input type="text" id="example-input1-group1" name="title" class="form-control form-control-border"  placeholder="Enter a Title" value="{{$post->title}}">
                        </div>
                        <div class="input-group m-b-30">
                            <textarea id="elm1" name="content" >{{$post->content}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient-secondary waves-effect ">Update</button>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('base_script')
    <!--Wysiwig js-->
    <script src="{{asset('/assets/plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('/assets/pages/jquery.form-editor.init.js')}}"></script>
@endsection
