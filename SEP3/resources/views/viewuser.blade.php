@extends('layouts.app')
@auth
@section('content')
    <div class="container">
        @if(session('unban'))
            <div class="alert alert-success">
                {{session('unban')}}
            </div>
            @elseif(session('ban'))
                <div class="alert alert-danger">
                    {{session('ban')}}
                </div>
        @elseif(session('delete'))
            <div class="alert alert-danger">
                {{session('delete')}}
            </div>
        @elseif(session('accountupdate'))
            <div class="alert alert-success">
                {{session('accountupdate')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('View Logged Customer Details') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @php
                            $user = Auth::user();
                        @endphp

                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <table class="table table-bordered" >
                                            <tr>

                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($viewuser as $row )
                                                <tr>
                                                    <td>{{$row['id']}}</td>
                                                    <td>{{$row['firstname']}}</td>
                                                    <td>{{$row['lastname']}}</td>
                                                    <td>{{$row['username']}}</td>
                                                    <td>{{$row['phonenum']}}</td>
                                                    <td>{{$row['address']}}</td>
                                                    <td>{{$row['email']}}</td>
                                                    <form method="POST" action="{{ route('staffregister') }}">
                                                       <input hidden type="text" class="form-control" name="id" id="id" value="{{$row->id}}">
                                                    <td><a href="{{route('updateuser',$row->id)}}" class="btn btn-success">Update</a>
                                                    <a href="{{route('deleteuser', $row->id)}}" class="btn btn-danger">Delete</a>
                                                        @if( $row['status']=='Active')
                                                        <a href="{{route('banuser', $row->id)}}" class="btn btn-outline-dark">Ban</a></td>
                                                        @endif
                                                        @if( $row['status']=='Banned')
                                                            <a href="{{route('unbanuser', $row->id)}}" class="btn btn-outline-success">Unban</a></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
@endauth
