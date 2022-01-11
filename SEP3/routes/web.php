<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\ProfilesController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('myprofile', 'App\Http\Controllers\ProfilesController@myprofile')->name
    ('myprofile');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::put('change', 'App\Http\Controllers\ProfilesController@update')->name
    ('change');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('makerequest', 'App\Http\Controllers\RequestController@makerequest')->name
    ('makerequest');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('viewuser', 'App\Http\Controllers\ProfilesController@viewuser')->name
    ('viewuser');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('viewcustomerrequests', 'App\Http\Controllers\RequestController@viewcustomerrequests')->name
    ('viewcustomerrequests');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('viewongoingrequests', 'App\Http\Controllers\RequestController@viewongoingrequests')->name
    ('viewongoingrequests');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('viewcancelledrequests', 'App\Http\Controllers\RequestController@viewcancelledrequests')->name
    ('viewcancelledrequests');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('viewcompletedrequests', 'App\Http\Controllers\RequestController@viewcompletedrequests')->name
    ('viewcompletedrequests');
});

//use App\Mail\PaymentMail;
//
//Route::get('/email',function(){
//    Mail::to('imusstarg4l@gmail.com')->send(new PaymentMail());
//    return new PaymentMail();
//});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('edit', 'App\Http\Controllers\ProfilesController@edit')->name
    ('edit');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('edit1/{id}', 'App\Http\Controllers\RequestController@edit1')->name
    ('edit1');
});

Route::get('/search','App\Http\Controllers\RequestController@search');

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('pay/{id}', 'App\Http\Controllers\PaymentController@pay')->name
    ('pay');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('deleteuser/{id}', 'App\Http\Controllers\ProfilesController@deleteuser')->name
    ('deleteuser');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('banuser/{id}', 'App\Http\Controllers\ProfilesController@banuser')->name
    ('banuser');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('unbanuser/{id}', 'App\Http\Controllers\ProfilesController@unbanuser')->name
    ('unbanuser');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('accept', 'App\Http\Controllers\RequestController@accept')->name
    ('accept');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('reject', 'App\Http\Controllers\RequestController@reject')->name
    ('reject');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('custdecision/{id}', 'App\Http\Controllers\RequestController@custdecision')->name
    ('custdecision');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::post('updateApproval', 'App\Http\Controllers\RequestController@updateApproval')->name
    ('updateApproval');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::post('updateApproval1', 'App\Http\Controllers\RequestController@updateApproval1')->name
    ('updateApproval1');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('custdecideapprove/{id}', 'App\Http\Controllers\RequestController@custdecideapprove')->name
    ('custdecideapprove');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('custdecidedecline/{id}', 'App\Http\Controllers\RequestController@custdecidedecline')->name
    ('custdecidedecline');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::post('makeDecision', 'App\Http\Controllers\RequestController@makeDecision')->name
    ('makeDecision');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::post('editrequest', 'App\Http\Controllers\RequestController@update')->name
    ('editrequest');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('viewstaffregister', 'App\Http\Controllers\ProfilesController@viewstaffregister')->name
    ('viewstaffregister');
});

Route::group(['middleware' => ['auth' ]], function() {
    Route::POST('staffregister', 'App\Http\Controllers\ProfilesController@save')->name
    ('staffregister');
});
//Route for edit profile for customer
Route::group(['middleware' => ['auth' ]], function(){
    Route::patch('change', 'App\Http\Controllers\ProfilesController@change')->name
    ('change');

});



// >>>>>>> 998b3be3b6b79df721c1047e566949f4ef58efad
//Route::group(['middleware' => ['auth' ]], function(){
//    Route::put('change1', 'App\Http\Controllers\RequestController@update1')->name
//    ('change1');
//});
Route::post('/checkout.credit-card','App\Http\Controllers\PaymentController@save');


////Route for staff update status
Route::group(['middleware' => ['auth' ]], function(){
    Route::post('updatestatus', 'App\Http\Controllers\RequestController@update1')->name
    ('updatestatus');
});
Route::group(['middleware' => ['auth' ]], function(){
    Route::post('updateprofile', 'App\Http\Controllers\ProfilesController@updateuser')->name
    ('updateprofile');
});
////Route for staff to update status
//Route::group(['middleware' => ['auth' ]], function(){
//    Route::patch('change1', 'App\Http\Controllers\RequestController@change1')->name
//    ('change1');
//
//});

Route::post('submit','App\Http\Controllers\RequestController@save');
Route::post('submitrequest','App\Http\Controllers\RequestController@submitrequest');

Route::get('accept/{id}',[RequestController::class,'showRequest']);
Route::post('accept',[RequestController::class,'updateApproval']);

Route::get('reject/{id}',[RequestController::class,'showRequest1']);
Route::post('reject',[RequestController::class,'updateApproval1']);

Route::get('delete/{id}',[RequestController::class,'delete']);


Route::get('custdecision/{id}',[RequestController::class,'custdecision']);
Route::post('custdecision',[RequestController::class,'makeDecision']);

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('update1/{id}', 'App\Http\Controllers\RequestController@viewstatusupdatepage')->name
    ('update1');
});

Route::group(['middleware' => ['auth' ]], function(){
    Route::get('updateuser/{id}', 'App\Http\Controllers\ProfilesController@viewuserupdatepage')->name
    ('updateuser');
});




