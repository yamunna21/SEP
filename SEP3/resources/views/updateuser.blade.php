@extends('layouts.app')
@auth
@section('content')
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('Update Customer Details') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


    <form action="{{route ('updateprofile')}}" method="POST">
    @csrf

    <div class="form-group">
                <input hidden type="text" class="form-control" name="id" id="id" value="{{$updateuser->id}}">
            </div>

    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="firstname" id="firstname" value="{{$updateuser->firstname}}">
    </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{$updateuser->lastname}}">
        </div>


        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="{{$updateuser->username}}">
        </div>

        <div class="form-group">
            <label for="phonenum">Phone Number</label>
            <input type="text" class="form-control" name="phonenum" id="phonenum" value="{{$updateuser->phonenum}}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{$updateuser->address}}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$updateuser->email}}">
        </div>

        <button class="btn btn-inverse btn-primary" >Update Profile</button>

    </form>



{{--                            <form method="POST" action="{{ route('updateprofile')}}"/>--}}
{{--                                @method('PUT')--}}
{{--                                @csrf--}}
{{--                                First Name: <input type="text" name="firstname" value = {{Auth::user()->firstname}} ><br><br>--}}
{{--                                Last Name: <input type="text" name="lastname" value = {{Auth::user()->lastname}} ><br><br>--}}
{{--                                Username: <input type="text" name="username" value = {{Auth::user()->username}} ><br><br>--}}
{{--                                Phone Number: <input type="text" name="phonenum" value = {{Auth::user()->phonenum}} ><br><br>--}}
{{--                                Address: <input type="text" name="address" value = {{Auth::user()->address}} ><br><br>--}}
{{--                                Email: <input type="text" name="email" value = {{Auth::user()->email}} ><br><br>--}}

{{--

{{--                                <a type="submit" class="btn btn-inverse btn-primary" href="viewuser" >{{ __('Update Profile') }}</a>--}}
{{--                            </form>--}}


    @endsection
@endauth
