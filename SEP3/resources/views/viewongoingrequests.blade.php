@extends('layouts.app')
@auth
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                <div class="card-header bg-info text-white">{{ __('Ongoing Requests') }}</div>
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
                                                <th>Estimated Cost</th>
                                                <th>Staff In Charge</th>
                                                <th>Comment</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($viewongoingrequests as $row )
                                                <tr>
                                                    <td>{{$row['name']}}</td>
                                                    <td>{{$row['devicetype']}}</td>
                                                    <td>{{$row['model']}}</td>
                                                    <td>{{$row['deviceos']}}</td>
                                                    <td>{{$row['repairdetails']}}</td>
                                                    <td>{{$row['s_approval']}}</td>
                                                    <td>{{$row['c_approval']}}</td>
                                                    <td>{{$row['estimated_cost']}}</td>
                                                    <td>{{$row['staffincharge']}}</td>
                                                    <td>{{$row['comment']}}</td>
                                                    <td>{{$row['status']}}</td>
                                                     <form method="POST" action="{{ route('staffregister') }}">
                                                       <input hidden type="text" class="form-control" name="id" id="id" value="{{$row->id}}">
                                                       <td><a href={{"update1/".$row['id']}}>Update</a></td>
{{--                                                   <td><a href="{{ route('update1') }}">{{ __('Update') }}</a></td>--}}
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
                                               <th>Estimated Cost</th>
                                               <th>Comment</th>
                                               <th>Status</th>
                                           </tr>
                                           @foreach($viewongoingrequests as $row )
                                               <tr>

                                                   <td>{{$row['name']}}</td>
                                                   <td>{{$row['devicetype']}}</td>
                                                   <td>{{$row['model']}}</td>
                                                   <td>{{$row['deviceos']}}</td>
                                                   <td>{{$row['repairdetails']}}</td>
                                                   <td>{{$row['s_approval']}}</td>
                                                   <td>{{$row['c_approval']}}</td>
                                                   <td>{{$row['estimated_cost']}}</td>
                                                   <td>{{$row['comment']}}</td>
                                                   <td>{{$row['status']}}</td>
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
