    @extends('layouts.app')
@auth
@section('content')
<style>

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.6);
}

</style>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
    <div class="container">
        @if(session('myprofileupdate'))
            <div class="alert alert-success">
                {{session('myprofileupdate')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('My Profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif





                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <table class="table table-bordered" >
                                    <tr>

                                        <th>You're logged in as: </th>
                                        <td>{{Auth::user()->user_type}}</td></tr>
                                    <tr>
                                    <tr>

                                        <th>Your Username is:  </th>
                                        <td>{{Auth::user()->username}}</td></tr>
                                    <tr>
                                    <tr>

                                        <th>Your First Name is:  </th>
                                        <td>{{Auth::user()->firstname}}</td></tr>
                                    <tr>
                                    <tr>

                                        <th>Your Last Name is: </th>
                                        <td>{{Auth::user()->lastname}}</td></tr>
                                    <tr>
                                    <tr>

                                        <th>Your Email Address is: </th>
                                        <td>{{Auth::user()->email}}</td></tr>
                                    <tr>
                                    <tr>

                                        <th>Your Phonenumber is:</th>
                                        <td>{{Auth::user()->phonenum}}</td></tr>
                                    <tr>
                                    <tr>

                                        <th>Your Address is: </th>
                                        <td>{{Auth::user()->address}}</td></tr>
                                </table>
                                <a class="btn btn-success" href="{{ route('edit') }}">{{ __('Edit') }}</a>

@endsection
    @endauth
