@extends('layouts.base')
@section('title', 'User Settings')
@section('base-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">All Users</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Users</h4>


                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Names</th>
                                    <th>Roles</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @can('edit-user')
                                                <a href="{{route('admin.users.edit',$user->id)}}"class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                            @endcan
                                            @can('delete-user')
                                                <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-user-form').submit();"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                                <form id="delete-user-form" action="{{route('admin.users.destroy',$user->id)}}" method="post" class="float-left">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <p>No Users</p>
                                    @endforelse
                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
@endsection
