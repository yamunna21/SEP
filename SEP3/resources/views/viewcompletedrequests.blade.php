@extends('layouts.app')
@auth
@section('content')
    <div class="container">
        @if(session('donepayment'))
            <div class="alert alert-success">
                {{session('donepayment')}}
            </div>
       @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                <div class="card-header bg-success text-white">{{ __('Completed Requests') }}</div>
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
                                           <form class="form-inline my-2 my-lg-0" type="get" action="{{url('/search')}}">
                                               <input class="form-control mr-sm-2" name="query"type="search" placeholder="Search Name" aria-label="Search"/>
                                               <button  class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                           </form>
                                        <table id="dynamic-row" class="table table-bordered">
                                            <tr>

                                                <th>Name</th>
                                                <th>Device Type</th>
                                                <th>Device Model</th>
                                                <th>Device OS</th>
                                                <th>Repair Details</th>
                                                <th>Status</th>
                                                <th>Final Price</th>
                                            </tr>
                                            @foreach($viewcompletedrequests as $row )
                                                <tr>
                                                    <td>{{$row['name']}}</td>
                                                    <td>{{$row['devicetype']}}</td>
                                                    <td>{{$row['model']}}</td>
                                                    <td>{{$row['deviceos']}}</td>
                                                    <td>{{$row['repairdetails']}}</td>
                                                    <td>{{$row['status']}}</td>
                                                    <td>{{$row['finalprice']}}</td>
                                                    @if($row['status']=='Completed(Unpaid)')
                                                        <td><a  class="btn btn-success"href={{"update1/".$row['id']}}>Edit Pay</a></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </table>
                                        @endif
                                        @if($user->user_type =='Customer')
                                        <table id="dynamic-row" class="table table-bordered">
                                           <tr>

                                               <th>Name</th>
                                               <th>Device Type</th>
                                               <th>Device Model</th>
                                               <th>Device OS</th>
                                               <th>Repair Details</th>
                                               <th>Status</th>
                                               <th>Final Price</th>

                                           </tr>
                                           @foreach($viewcompletedrequests as $row )
                                               <tr>

                                                   <td>{{$row['name']}}</td>
                                                   <td>{{$row['devicetype']}}</td>
                                                   <td>{{$row['model']}}</td>
                                                   <td>{{$row['deviceos']}}</td>
                                                   <td>{{$row['repairdetails']}}</td>
                                                   <td>{{$row['status']}}</td>
                                                   <td>{{$row['finalprice']}}</td>
                                                   @if($row['status']=='Completed(Unpaid)')
                                                   <td><a href="{{route('pay', $row->id)}}" class="btn btn-success">Pay</a></td>
                                                       @endif
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
