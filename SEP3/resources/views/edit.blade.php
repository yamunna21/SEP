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
                    <div class="card-header bg-secondary text-white">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


    <form action="{{route ('change')}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="username">Username</label>
        <input readonly type="text" class="form-control" name="username" id="username" value="{{$user->username}}">
    </div>

        <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" id="firstname" value="{{$user->firstname}}">
        </div>

        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{$user->lastname}}">
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="phonenum">Phone Number</label>
            <input type="text" class="form-control" name="phonenum" id="phonenum" value="{{$user->phonenum}}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}">
        </div>

        <button class="btn btn-info" >Change</button>

    </form>
{{--                            <form method="POST" action="{{ route('change')}}"/>--}}
{{--                                @method('PUT')--}}
{{--                                @csrf--}}
{{--                                Username: <input type="text" readonly name="username" value = {{Auth::user()->username}} ><br><br>--}}
{{--                                First Name: <input type="text" name="firstname" value = {{Auth::user()->firstname}} ><br><br>--}}
{{--                                Last Name: <input type="text" name="lastname" value = {{Auth::user()->lastname}} ><br><br>--}}
{{--                                Email Address: <input type="email" name="email" value = {{Auth::user()->email}} ><br><br>--}}
{{--                                Phone Number: <input type="number" name="phonenum" value = {{Auth::user()->phonenum}} ><br><br>--}}
{{--                                Address: <input type="text" name="address" value = {{Auth::user()->address}} ><br><br>--}}

{{--                                <a type="submit" class="btn btn-info" href="myprofile" >{{ __('Change') }}</a>--}}
{{--                            </form>--}}


    @endsection
@endauth
