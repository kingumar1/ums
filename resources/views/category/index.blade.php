@extends('layouts.base')
@section('title', 'All Categories')
@section('base-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Categories</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Users</h4>


                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cats as $cat)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->created_at->toDateString()}}</td>
                                    <td>
                                        @can('edit-user')
                                            <a href="{{route('category.edit',$cat->id)}}"class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        @endcan
                                        @can('delete-user')
                                            <a href="#" onclick="event.preventDefault();
                                                document.getElementById('delete-user-form-{{$cat->id}}').submit();"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                            <form id="delete-user-form-{{$cat->id}}" action="{{route('category.delete',$cat->id)}}" method="post" class="float-left">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <p>No Categories are currently available</p>
                            @endforelse
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
        <div class="center">
            {{$cats->links()}}
        </div>
@endsection
