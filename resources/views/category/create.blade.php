@extends('layouts.base')
@section('title','Add New Category')
@section('base-content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">New Category</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>

    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('category.store')}}">
                        @csrf
                        <div class="input-group m-b-30">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" id="example-input1-group1" name="name" class="form-control form-control-border @error('name') is-invalid @enderror"  placeholder="Enter a Category">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary waves-effect waves-light">Add Category</button>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
