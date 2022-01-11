<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

     public function edit(User $user)
    {
        $edit = user::all()->where('name', Auth::user()->firstname);
        return view('edit')->with('user',auth()->user());
    }


    public function index()
    {

        return view('home');
    }

    public function myprofile()
    {
        return view('myprofile');
    }
    public function viewstaffregister()
    {
        return view('staffregister');
    }
    protected function save(Request $data)
    {
        $lol = new User();
        $lol->firstname = $data->firstname;
        $lol->username = $data->username;
        $lol->email = $data->email;
        $lol->user_type = $data->user_type;
        $lol->address = $data->address;
        $lol->lastname = $data->lastname;
        $lol->phonenum = $data->phonenum;
        $lol->password = Hash::make($data['password']);
        $lol->save();
        return view('home')->with('alert', 'New Staff Registered');

    }

    public function update(UpdateProfileRequest $request){

        $user = auth()->user();
        $user->update([
            'username'=>$request->username,
            'email'=>$request->email,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'phonenum'=>$request->phonenum,
            'address'=>$request->address,

        ]);
        return redirect('myprofile')->with('myprofileupdate', 'Details updated!');

    }

    public function viewuser()
    {
        $viewuser = user::all()->where('user_type','=','Customer');
        return view ('viewuser',compact('viewuser'));
    }

    public function deleteuser($id){
        $viewuser =  User::find($id);
        $viewuser->Delete();
        return redirect('viewuser')->with('delete', 'Account Deleted!');
    }

    public function updateuser(UpdateProfileRequest $request){

        $request->validate([]);

        $data=user::find($request->id);
        $data->firstname = $request->firstname;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->lastname = $request->lastname;
        $data->phonenum = $request->phonenum;
        $data->save();
        return redirect('viewuser')->with('accountupdate', 'Account updated!');
    }

    public function banuser($id){

        $data=user::find($id);
        $data->status = "Banned";
        $data->save();
        return redirect('viewuser')->with('ban', 'Account Banned!');
    }

    public function unbanuser($id){

        $data=user::find($id);
        $data->status = "Active";
        $data->save();

        return redirect('viewuser')->with('unban','Account Unbanned!');
    }

    public function viewuserupdatepage($id){
        $data=user::find($id);
        return view('updateuser',['updateuser'=>$data]);
    }
}
