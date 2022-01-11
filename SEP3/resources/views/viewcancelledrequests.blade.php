@extends('layouts.app')
@auth
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                <div class="card-header bg-danger text-white">{{ __('Cancelled Requests') }}</div>
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
                                                <th>Staff Approval</th>
                                                <th>Customer Decision</th>
                                                <th>Status</th>
                                                <th>Comment</th>
                                            </tr>
                                            @foreach($viewcancelledrequests as $row )
                                                <tr>
                                                    <td>{{$row['name']}}</td>
                                                    <td>{{$row['devicetype']}}</td>
                                                    <td>{{$row['model']}}</td>
                                                    <td>{{$row['deviceos']}}</td>
                                                    <td>{{$row['repairdetails']}}</td>
                                                    <td>{{$row['s_approval']}}</td>
                                                    <td>{{$row['c_approval']}}</td>
                                                    <td>{{$row['status']}}</td>
                                                    <td>{{$row['comment']}}</td>
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
                                               <th>Staff Approval</th>
                                               <th>Customer Decision</th>
                                               <th>Status</th>
                                               <th>Comment</th>
                                           </tr>
                                           @foreach($viewcancelledrequests as $row )
                                               <tr>

                                                   <td>{{$row['name']}}</td>
                                                   <td>{{$row['devicetype']}}</td>
                                                   <td>{{$row['model']}}</td>
                                                   <td>{{$row['deviceos']}}</td>
                                                   <td>{{$row['repairdetails']}}</td>
                                                   <td>{{$row['s_approval']}}</td>
                                                   <td>{{$row['c_approval']}}</td>
                                                   <td>{{$row['status']}}</td>
                                                   <td>{{$row['comment']}}</td>
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
