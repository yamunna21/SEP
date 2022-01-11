@extends('layouts.app')
@auth
@section('content')
    <div class="container">
        @if(session('custdecline'))
            <div class="alert alert-danger">
                {{session('custdecline')}}
            </div>
        @elseif(session('custapprove'))
            <div class="alert alert-success">
                {{session('custapprove')}}
            </div>
        @elseif(session('updatereq'))
            <div class="alert alert-success">
                {{session('updatereq')}}
            </div>
        @elseif(session('newreq'))
            <div class="alert alert-success">
                {{session('newreq')}}
            </div>
        @elseif(session('staffaccept'))
            <div class="alert alert-success">
                {{session('staffaccept')}}
            </div>
        @elseif(session('staffdecline'))
            <div class="alert alert-danger">
                {{session('staffdecline')}}
            </div>
        @elseif(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>

        @endif
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('Pending Requests') }}</div>

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
                                     @if($user->user_type =='Staff')
                                        <table class="table table-bordered">
                                            <tr>

                                                <th>Name</th>
                                                <th>Device Type</th>
                                                <th>Device Model</th>
                                                <th>Device OS</th>
                                                <th>Repair Details</th>
                                                <th>Approval</th>
                                                <th>Customer Decision</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($viewcustomerrequests as $row )
                                                <tr>
                                                    <td>{{$row['name']}}</td>
                                                    <td>{{$row['devicetype']}}</td>
                                                    <td>{{$row['model']}}</td>
                                                    <td>{{$row['deviceos']}}</td>
                                                    <td>{{$row['repairdetails']}}</td>
                                                    <td>{{$row['s_approval']}}</td>
                                                    <td>{{$row['c_approval']}}</td>

                                                    <form method="POST" action="{{ route('accept') }}">
                                                       <input hidden type="text" class="form-control" name="id" id="id" value="{{$row->id}}">
                                                       <td>@if($row['s_approval'] != 'Pending')
                                                          <a class=isDisabled href={{"accept/".$row['id']}}>Accept&nbsp&nbsp&nbsp</a>
                                                          @elseif($row['s_approval'] == "Pending")
                                                          <a href={{"accept/".$row['id']}}>Accept&nbsp&nbsp&nbsp</a>
                                                          @endif
                                                          @if($row['s_approval'] != 'Pending')
                                                          <a class=isDisabled href={{"reject/".$row['id']}}>Reject</a>
                                                          @elseif($row['s_approval'] == "Pending")
                                                          <a href={{"reject/".$row['id']}}>Reject</a>
                                                          @endif
{{--                                                   <td><a href="{{ route('accept') }}">{{ __('Accept') }}</a><a href="{{ route('reject') }}">{{ __('Reject') }}</a></td>--}}
                                                   <!--  <td>  <a class="btn btn-success" href="{{ route('edit')}}">{{ __('Accept') }}</a>
                                                      <a class="btn btn-danger" href="{{ route('edit')}}">{{ __('Reject') }}</a></td> -->
                                                </form>
                                                </tr>
                                            @endforeach
                                        </table>
                                      @endif
                                      @if($user->user_type =='Customer')
                                      <table class="table table-bordered">
                                           <tr>

                                               <th>Name</th>
                                               <th>Device Type</th>
                                               <th>Device Model</th>
                                               <th>Device OS</th>
                                               <th>Repair Details</th>
                                               <th>Approval</th>
                                               <th>Decision</th>
                                               <th>Action</th>
                                           </tr>
                                           @foreach($viewcustomerrequests as $row )
                                               <tr>

                                                   <input type="hidden" class="form-control" name="id" id="id" value="{{$row->id}}">
                                                   <td>{{$row['name']}}</td>
                                                   <td>{{$row['devicetype']}}</td>
                                                   <td>{{$row['model']}}</td>
                                                   <td>{{$row['deviceos']}}</td>
                                                   <td>{{$row['repairdetails']}}</td>
                                                   <td>{{$row['s_approval']}}</td>
                                                   <td>{{$row['c_approval']}}</td>
                                                   <form method="POST" action="{{ route('staffregister') }}">
                                                       <input hidden type="text" class="form-control" name="id" id="id" value="{{$row->id}}">
                                                       <td>@if($row['s_approval'] == 'Pending')
                                                          <a href={{"edit1/".$row['id']}}>Update&nbsp&nbsp&nbsp</a>
                                                          @elseif($row['s_approval'] == "Accepted")
                                                          <a class =isDisabled href={{"edit1/".$row['id']}}>Update</a>
                                                          @endif
                                                          @if($row['s_approval'] == 'Pending')
                                                          <a class=isDisabled href={{"custdecision/".$row['id']}}>Decide&nbsp&nbsp&nbsp</a>
                                                          @elseif($row['s_approval'] == "Accepted")
                                                          <a href={{"custdecision/".$row['id']}}>Decide</a>
                                                          @endif
                                                          @if($row['s_approval'] == 'Pending')
                                                          <a href={{"delete/".$row['id']}}>Delete&nbsp&nbsp&nbsp</a>
                                                          @elseif($row['s_approval'] == "Accepted")
                                                          <a  class =isDisabled href={{"delete/".$row['id']}}>Delete</a>
                                                          @endif
                                                       <!-- <td><a href={{"edit1/".$row['id']}}>Update&nbsp&nbsp&nbsp</a><a href={{"custdecision/".$row['id']}}>Decide</a></td> -->
{{--                                                   <td><a href="{{ route('edit1') }}">{{ __('Update') }}</a><a href="{{ route('custdecision') }}">{{ __('Decide') }}</a><a href="{{ route('delete') }}">{{ __('Delete') }}</a></td>--}}
                                                   </form>
                                               </tr>
                                           @endforeach
                                       </table>
                                       @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
@endauth
