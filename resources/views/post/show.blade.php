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
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Comments</h4>
                    <div class="m-b-30">
                        <div class="comments-div">
                            @forelse($post->comments as $comment)
                                <h4>{{$comment->name}}</h4>
                                <p>{{$comment->content}}</p>
                                <hr>
                            @empty
                                <p>No Comments Available</p>
                            @endforelse
                        </div>
                    </div>

                    <h4 class="mt-0 header-title">Add Comment</h4>
                    <form id="comment_form" method="post" >
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" type="text" class="form-control"  >
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">Comment</label>
                                    <textarea name="content" class="form-control" rows="5" required ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-gradient-primary px-5 py-2">Enter Comment</button>
                            </div>
                        </div>
                    </form>
                </div><!--end card-body-->
            </div>
        </div>
    </div>
@endsection
@section('ajax')
    <script>
        $(document).ready(function () {

            $('#comment_form').on('submit', function f(e) {

                e.preventDefault();
                $.ajax({
                    type:"POST",
                    dataType:"json",
                    url: "{{route('comment.store',$post->id)}}",
                    data:$('#comment_form').serialize(),
                    success:function (data) {
                        var html = "";
                        if(data.errors){
                            html +="<div class='alert alert-danger'>";
                            for ( var i =0; i < data.errors.length; i++){
                                html += "<p>"+ data.errors[i] + "</p>";
                            }
                        }
                        else{
                            html +="<h5>"+ data.data.name + "</h5>";
                            html +="<p>"+ data.data.content + "</p>";
                            html +="<hr>";
                        }
                        $('.comments-div').append(html);
                        console.log(data);
                        $('#comment_form')[0].reset();
                    },
                    error: function (jqXhr, textStatus, errorMessage) { // error callback
                        console.log(errorMessage);
                    }
                });
            });
        });

    </script>
@endsection
