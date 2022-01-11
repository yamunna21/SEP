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
                    <div class="card-header bg-secondary text-white">{{ __('Request Details') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


    <form action="{{route ('updateApproval1')}}" method="POST">
    @csrf


            <div class="form-group">
                <input hidden type="text" class="form-control" name="id" id="id" value="{{$reject->id}}">
            </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input readonly type="text" class="form-control" name="username" id="username" value="{{$reject->name}}">
    </div>

        <div class="form-group">
            <label for="devicetype">Device Type</label>
            <input readonly type="text" class="form-control" name="devicetype" id="devicetype" value="{{$reject->devicetype}}">
        </div>

        <div class="form-group">
            <label for="model">Device Model</label>
            <input readonly type="text" class="form-control" name="model" id="model" value="{{$reject->model}}">
        </div>

        <div class="form-group">
            <label for="deviceos">Device OS</label>
            <input readonly type="text" class="form-control" name="deviceos" id="deviceos" value="{{$reject->deviceos}}">
        </div>

        <div class="form-group">
            <label for="repairdetails">Repair Details</label>
            <input readonly type="text" class="form-control" name="repairdetails" id="repairdetails" value="{{$reject->repairdetails}}">
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <input type="text" class="form-control" name="comment" id="comment" value="{{$reject->comment}}" required>
        </div>


        <input hidden type="text" name="s_approval" value="Cancelled">
        <input hidden type="text" name="status" value="Cancelled">
        <input hidden type="text" name="staffincharge" value="{{Auth::user()->username}}">
        <button class="btn btn-success" >Save Info</button>

    </form>

{{--                            <form method="POST" action="{{ route('updateApproval1')}}"/>--}}
{{--                                @method('PUT')--}}
{{--                                @csrf--}}
{{--                                Username: <input type="text" readonly name="username" value = {{Auth::user()->username}} ><br><br>--}}
{{--                                Device Type: <input type="text" name="devicetype" value = {{Auth::user()->devicetype}} ><br><br>--}}
{{--                                Device Model: <input type="text" name="model" value = {{Auth::user()->model}} ><br><br>--}}
{{--                                Device OS: <input type="text" name="deviceos" value = {{Auth::user()->deviceos}} ><br><br>--}}
{{--                                Repair Details: <input type="text" name="repairdetails" value = {{Auth::user()->repairdetails}} ><br><br>--}}
{{--
                                    Decline Reason: <input type="text" name="comment" value =   {{Auth::user()->comment}} ><br><br>--}}
{{--
                                    <input hidden type="text" name="s_approval" value="Cancelled">
                                    <input hidden type="text" name="status" value="Cancelled">
                                    <input hidden type="text" name="staffincharge" value="{{Auth::user()->username}}">


{{--                                <a type="submit" class="btn btn-success" href="viewcustomerrequests" >{{ __('Save Info') }}</a>--}}
{{--                            </form>--}}


    @endsection
@endauth
