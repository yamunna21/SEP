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
                    <div class="card-header bg-secondary text-white">{{ __('Request Decision') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


    <form action="{{route ('makeDecision')}}" method="POST">
    @csrf


            <div class="form-group">
                <input hidden type="text" class="form-control" name="id" id="id" value="{{$custdecision->id}}">
            </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input readonly type="text" class="form-control" name="username" id="username" value="{{$custdecision->name}}">
    </div>

        <div class="form-group">
            <label for="devicetype">Device Type</label>
            <input readonly type="text" class="form-control" name="devicetype" id="devicetype" value="{{$custdecision->devicetype}}">
        </div>

        <div class="form-group">
            <label for="model">Device Model</label>
            <input readonly type="text" class="form-control" name="model" id="model" value="{{$custdecision->model}}">
        </div>

        <div class="form-group">
            <label for="deviceos">Device OS</label>
            <input readonly type="text" class="form-control" name="deviceos" id="deviceos" value="{{$custdecision->deviceos}}">
        </div>

        <div class="form-group">
            <label for="repairdetails">Repair Details</label>
            <input readonly type="text" class="form-control" name="repairdetails" id="repairdetails" value="{{$custdecision->repairdetails}}">
        </div>

        <div class="form-group">
            <label for="estimated_cost">Estimated Cost</label>
            <input readonly type="text" class="form-control" name="estimated_cost" id="estimated_cost" value="{{$custdecision->estimated_cost}}">

        </div>
        <a href="{{route('custdecideapprove', $custdecision->id)}}" class="btn btn-success">Approve</a>
        <a href="{{route('custdecidedecline', $custdecision->id)}}" class="btn btn-danger">Decline</a>


</form>


{{--                            <form method="POST" action="{{ route('makeDecision')}}"/>--}}
{{--                                @method('PUT')--}}
{{--                                Username: <input type="text" readonly name="username" value = {{Auth::user()->username}} ><br><br>--}}
{{--                                Device Type: <input type="text" name="devicetype" value = {{Auth::user()->devicetype}} ><br><br>--}}
{{--                                Device Model: <input type="text" name="model" value = {{Auth::user()->model}} ><br><br>--}}
{{--                                Device OS: <input type="text" name="deviceos" value = {{Auth::user()->deviceos}} ><br><br>--}}
{{--                                Repair Details: <input type="text" name="repairdetails" value = {{Auth::user()->repairdetails}} ><br><br>--}}
{{--
                                    Estimated Cost: <input type="text" name="estimated_cost" value =   {{Auth::user()->estimated_cost}} ><br><br>--}}

{{--
{{--                                <input hidden type="text" name="c_approval" value="Accepted">
                                    <a type="submit" class="btn btn-success" href="viewcustomerrequests" >{{ __('Accept') }}</a>--}}

{{--                                <input hidden type="text" name="c_approval" value="Cancelled">
                                    <a type="submit" class="btn btn-danger" href="viewcustomerrequests" >{{ __('Decline') }}</a>--}}

{{--                            </form>--}}


    @endsection
@endauth
