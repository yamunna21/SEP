@extends('layouts.app')
@auth
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('Make Your Request') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


<form action="submit" method="POST">
    @csrf
                             <form>
                              <div class="form-group">
                               <label class="control-label col-sm-2" for="name">Name:</label>
                               <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" value = {{Auth::user()->firstname}} readonly><br>
                            <div class="form-group">
                             <label for="devicetype">Choose a Device Type:</label>
                              <select class="form-control" id="devicetype" name="devicetype">
                               <option value="PC">PC</option>
                               <option value="Laptop">Laptop</option>
                              </select>
                           </div>
                            <div class="form-group">
                                <label for="deviceos">Choose a Device OS:</label>
                                 <select class="form-control" id="deviceos" name="deviceos">
                                <option value="Windows">Windows 10 or Older</option>
                                 <option value="Linux">Linux/Ubuntu</option>
                                 </select>
                                </div>
                            <div class="form-group">
                                <label for="model">Device Model:</label>
                                <input type="text" class="form-control" name="model" placeholder="eg. Acer,Dell" required >
                            </div>
                            <label for="repairdetails">Repair Details:</label>
                            <textarea name="repairdetails" placeholder="Explain further regarding your device repair" class="form-control" rows="5" cols="40"  id="repairdetails"></textarea><br>
                            <input hidden type="text" name="estimated_cost" value="-">
                            <input hidden type="text" name="s_approval" value="Pending">
                            <input hidden type="text" name="c_approval" value="Pending">
                            <input hidden type="text" name="comment" value="-">
                            <input hidden type="text" name="staffincharge" value="-">
                            <input hidden type="text" name="status" value="-">




    <button type="submit" class="btn btn-info"> SUBMIT</button>
</form>




                            </body>
@endsection
@endauth
