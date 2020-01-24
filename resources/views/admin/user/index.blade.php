@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">


                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
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
                                            <a href="{{route('admin.users.edit',$user->id)}}"><button class="btn btn-primary float-left">Edit</button></a>
                                            @endcan
                                            @can('delete-user')
                                            <form action="{{route('admin.users.destroy',$user->id)}}" method="post" class="float-left">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-warning">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <p>No Users</p>
                                @endforelse

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
