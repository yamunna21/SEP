<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\Users\UpdateRequest;
use App\Http\Requests\Users\DecisionRequest;
use App\Models\crequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RequestController
{
    public function makerequest()
    {
        return view('makerequest');
    }
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required',
//            'email' => 'required',
//            'website' => 'required',
//            'comment' => 'required',
//        ]);
//        }
     function save(Request $req)
    {
//        var_dump(request('name'));
//        var_dump(request('email'));
//        var_dump(request('website'));
//        var_dump(request('comment'));

      $crequest = new crequest();
      $crequest->name = $req->name;
      $crequest->devicetype = $req->devicetype;
      $crequest->deviceos = $req->deviceos;
      $crequest->model = $req->model;
      $crequest->repairdetails = $req->repairdetails;
      $crequest->estimated_cost =$req->estimated_cost;
      $crequest->s_approval =$req->s_approval;
      $crequest->staffincharge =$req->staffincharge;
      $crequest->c_approval =$req->c_approval;
      $crequest->comment =$req->comment;
      $crequest->status ='Pending';
      $crequest->finalprice ="0";
        echo $crequest->save();
        return redirect()->route('viewcustomerrequests')->with('newreq','Request Added');
    }

    public function viewcustomerrequests()
    {
         if(Auth::user()->user_type == "Staff"){
         $viewcustomerrequests = crequest::select('*')
                   ->where([
                        ['c_approval','=','Pending'],['s_approval','=','Pending']
                    ])
                   ->orWhere([
                        ['c_approval','=','Pending'],['s_approval','=','Accepted'],['staffincharge','=',
                         Auth::user()->username]
                    ])
                    ->get();
        }else{
            $viewcustomerrequests = crequest::select('*')
                   ->where([
                        ['s_approval','=','Pending'],['name','=', Auth::user()->firstname]
                    ])
                   ->orWhere([
                        ['s_approval','=','Accepted'],['c_approval','=','Pending'],
                        ['name','=', Auth::user()->firstname]
                    ])
                ->get();
        }
         return view ('viewcustomerrequests',compact('viewcustomerrequests'));

    }


     public function viewongoingrequests()
    {
        if(Auth::user()->user_type == "Staff"){
        $viewongoingrequests = crequest::select('*')
                ->where([
                    ['c_approval', '=', 'Accepted'],
                    ['s_approval', '=', 'Accepted'],
                    ['status','=','Ongoing'],
                    ['staffincharge', Auth::user()->username]
                ])
                ->get();
        } else {
        $viewongoingrequests = crequest::select('*')
                ->where([
                    ['c_approval', '=', 'Accepted'],
                    ['s_approval', '=', 'Accepted'],
                    ['status','=','Ongoing'],
                    ['name', Auth::user()->firstname]
                ])
                ->get();
        }
        return view ('viewongoingrequests',compact('viewongoingrequests'));
    }

    public function viewcancelledrequests()
    {
        if(Auth::user()->user_type == "Staff"){
        $viewcancelledrequests = crequest::select('*')

                ->where([
                    ['c_approval', '=', 'Cancelled'],
                    ['staffincharge', Auth::user()->username]
                ])
                ->orWhere([
                    ['s_approval', '=', 'Cancelled'],
                    ['staffincharge', Auth::user()->username]
                ])
                ->orWhere([
                    ['status','=','Cancelled'],
                    ['staffincharge', Auth::user()->username]
                ])
                ->get();
        }else{
        $viewcancelledrequests = crequest::select('*')
                ->where([
                    ['c_approval', '=', 'Cancelled'],
                    ['name', Auth::user()->firstname]
                ])
                ->orWhere([
                    ['s_approval', '=', 'Cancelled'],
                    ['name', Auth::user()->firstname]
                ])
                ->orWhere([
                    ['status','=','Cancelled'],
                    ['name', Auth::user()->firstname]
                ])
                ->get();
        }
        return view ('viewcancelledrequests',compact('viewcancelledrequests'));
    }

    public function viewcompletedrequests()
    {
        if(Auth::user()->user_type == "Staff"){
        $viewcompletedrequests = crequest::select('*')
                ->where([
                    ['status', '=', 'Completed(Paid)']
                ])
                ->orWhere([
                    ['status','=','Completed(Unpaid)']
                ])
                ->get();
        }else{
        $viewcompletedrequests = crequest::select('*')
            ->where([
                ['status', '=', 'Completed(Paid)'],
                ['name', Auth::user()->firstname]
            ])
            ->orWhere([
                ['status','=','Completed(Unpaid)'],
                ['name', Auth::user()->firstname]
            ])
                ->get();
        }
        return view ('viewcompletedrequests',compact('viewcompletedrequests'));
    }

     public function viewstatusrequest()
    {
        $viewstatusrequest = crequest::all();
        return view ('viewstatusrequest',compact('viewstatusrequest'));
    }


    public function edit1($id){
        $edit1 =  crequest::find($id);
        return view('edit1',['edit1'=>$edit1]);
    }

    public function custdecideapprove($id){
        $viewcustomerrequests =  crequest::find($id);
        $viewcustomerrequests->c_approval = "Accepted";
        $viewcustomerrequests->status = "Ongoing";
        $viewcustomerrequests->save();
        return redirect('viewcustomerrequests')->with('custapprove', 'Request updated!');
    }

    public function custdecidedecline($id){
        $viewcustomerrequests =  crequest::find($id);
        $viewcustomerrequests->c_approval = "Cancelled";
        $viewcustomerrequests->status = "Cancelled";
        $viewcustomerrequests->save();
        return redirect('viewcustomerrequests')->with('custdecline', 'Request updated!');
    }


    public function update(Request $req){

        $data=crequest::find($req->id);
        $data->repairdetails=$req->repairdetails;
        $data->save();
        return redirect('viewcustomerrequests')->with('updatereq', 'Request updated!');
    }

    public function showRequest($id){
        $accept = crequest::find($id);
        return view('accept',['accept'=>$accept]);
    }

     public function showRequest1($id){
        $reject = crequest::find($id);
        return view('reject',['reject'=>$reject]);
    }

    public function custdecision($id){
        $custdecision = crequest::find($id);
        return view('custdecision',['custdecision'=>$custdecision]);
    }

    public function updateApproval(Request $req){
        $data = crequest::find($req->id);
        $data->estimated_cost=$req->estimated_cost;
        $data->s_approval=$req->s_approval;
        $data->staffincharge=$req->staffincharge;
        $data->save();
        return redirect ('viewcustomerrequests')->with('staffaccept', 'Request accepted');
    }

     public function updateApproval1(Request $req){
        $data = crequest::find($req->id);
        $data->comment=$req->comment;
        $data->s_approval=$req->s_approval;
        $data->staffincharge=$req->staffincharge;
        $data->status=$req->status;

        $data->save();
        return redirect ('viewcustomerrequests')->with('staffdecline', 'Request declined');
    }

     public function makeDecision(Request $req){
        $data = crequest::find($req->id);
        $data->c_approval=$req->c_approval;
        $data->save();
        return redirect ('viewcustomerrequests');
    }

    public function makeDecision1(Request $req){
        $data = crequest::find($req->id);
        $data->c_approval=$req->c_approval;
        $data->save();
        return redirect ('viewcustomerrequests');
    }

    public function update1(Request $req){

        $data=crequest::find($req->id);
        $data->comment=$req->comment;
        $data->estimated_cost=$req->estimated_cost;
        $data->status=$req->status;
        $data->finalprice=$req->finalprice;
        $data->save();
        if($data->status=='Completed(Paid)' || $data->status=='Completed(Unpaid)'){
            return redirect('viewcompletedrequests')->with('status', 'Status updated!');
        }else{
        return redirect('viewongoingrequests')->with('status', 'Status updated!');
    }}

    public function viewstatusupdatepage($id){
        $data=crequest::find($id);
        return view('update1',['update1'=>$data]);
    }

    public function delete($id){
        $data=crequest::find($id);
        $data->delete();
        return redirect('viewcustomerrequests');
    }


    public function search(){
    $search_text = $_GET['query'];
    $data = crequest::where('name', 'LIKE', "%{$search_text}%")->get();

        return view('searched',['data'=>$data]);
}
//
    //public function search(Request $req){
    //$search = $req->input('search');
    //$data = crequest::query()
        //->where('username', 'LIKE', "%{$search}%")
        //->orWhere('firstname', 'LIKE', "%{$search}%")
        //->get();

    // Return the search view with the resluts compacted
   // return view('viewongoingrequests', compact('viewongoingrequests'));
//}//

}
