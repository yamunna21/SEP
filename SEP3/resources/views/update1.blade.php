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
                    <div class="card-header bg-secondary text-white">{{ __('Update Status') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


    <form action="{{route ('updatestatus')}}" method="POST">
    @csrf


            <div class="form-group">
                <input hidden type="text" class="form-control" name="id" id="id" value="{{$update1->id}}">
            </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input readonly type="text" class="form-control" name="username" id="username" value="{{$update1->name}}">
    </div>

        <div class="form-group">
            <label for="devicetype">Device Type</label>
            <input readonly type="text" class="form-control" name="devicetype" id="devicetype" value="{{$update1->devicetype}}">
        </div>


        <div class="form-group">
            <label for="model">Device Model</label>
            <input readonly type="text" class="form-control" name="model" id="model" value="{{$update1->model}}">
        </div>

        <div class="form-group">
            <label for="deviceos">Device OS</label>
            <input readonly type="text" class="form-control" name="deviceos" id="deviceos" value="{{$update1->deviceos}}">
        </div>

        <div class="form-group">
            <label for="repairdetails">Repair Details</label>
            <input type="text" class="form-control" name="repairdetails" id="repairdetails" value="{{$update1->repairdetails}}">
        </div>
        <div class="form-group">
            <label for="comment">Estimated Cost</label>
            <input type="text" class="form-control" name="estimated_cost" id="estimated_cost" value="{{$update1->estimated_cost}}">
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <input type="text" class="form-control" name="comment" id="comment" value="{{$update1->comment}}">
        </div>

        <div class="form-group">
            <label for="comment">Final Price</label>
            <input type="number" class="form-control" name="finalprice" id="finalprice" value="{{$update1->finalprice}}">
        </div>

            <input hidden type="text" class="form-control" name="status1" id="status1" value="{{$update1->status}}">

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" class="form-control" name="status" value="{{$update1->status}}">
                                <option value="Ongoing">On-Going</option>
                                 <option value="Completed(Unpaid)">Completed(Unpaid)</option>
                                 <option value="Cancelled">Cannot be repaired</option>
                @if($update1->status =='Completed(Unpaid)')
                    <option value="Completed(Paid)">Completed(Paid)</option>
                @endif

            </select>
        </div>

        <button class="btn btn-success" >Update Status</button>

    </form>



{{--                            <form method="POST" action="{{ route('updatestatus')}}"/>--}}
{{--                                @method('PUT')--}}
{{--                                @csrf--}}
{{--                                Username: <input type="text" readonly name="username" value = {{Auth::user()->username}} ><br><br>--}}
{{--                                Device Type: <input type="text" name="devicetype" value = {{Auth::user()->devicetype}} ><br><br>--}}
{{--                                Device Model: <input type="text" name="model" value = {{Auth::user()->model}} ><br><br>--}}
{{--                                Device OS: <input type="text" name="deviceos" value = {{Auth::user()->deviceos}} ><br><br>--}}
{{--                                Estimated Price: <input type="text" name="" value = {{Auth::user()->estimated_cost}} ><br><br>--}}
{{--                                Repair Details: <input type="text" name="repairdetails" value = {{Auth::user()->repairdetails}} ><br><br>--}}
{{--                                Comment: <input type="text" name="comment" value = {{Auth::user()->comment}} ><br><br>--}}
{{--                                Status: <label for="status">Status:</label>
                                 <select id="status" name="status">
                                   <option value="onprogress">On-Progress</option>
                                 <option value="pending">Pending</option>
                                 <option value="cannotrepair">Cannot be repaired</option><br><br>--}}
{{--

{{--                                <a type="submit" class="btn btn-success" href="viewstatusrequest" >{{ __('Update Status') }}</a>--}}
{{--                            </form>--}}


    @endsection
@endauth
