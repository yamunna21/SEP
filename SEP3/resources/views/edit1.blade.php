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
                    <div class="card-header">{{ __('Edit Request') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


    <form action="{{route ('editrequest')}}" method="POST">
    @csrf


            <div class="form-group">
                <input hidden type="text" class="form-control" name="id" id="id" value="{{$edit1->id}}">
            </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input readonly type="text" class="form-control" name="username" id="username" value="{{$edit1->name}}">
    </div>

        <div class="form-group">
            <label for="devicetype">Device Type</label>
            <input readonly type="text" class="form-control" name="devicetype" id="devicetype" value="{{$edit1->devicetype}}">
        </div>


        <div class="form-group">
            <label for="model">Device Model</label>
            <input readonly type="text" class="form-control" name="model" id="model" value="{{$edit1->model}}">
        </div>

        <div class="form-group">
            <label for="deviceos">Device OS</label>
            <input readonly type="text" class="form-control" name="deviceos" id="deviceos" value="{{$edit1->deviceos}}">
        </div>

        <div class="form-group">
            <label for="repairdetails">Repair Details</label>
            <input type="text" class="form-control" name="repairdetails" id="repairdetails" value="{{$edit1->repairdetails}}">
        </div>

        <button class="btn btn-success" >Edit Request</button>

    </form>





    @endsection
@endauth
