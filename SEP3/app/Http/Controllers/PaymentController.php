<?php

namespace App\Http\Controllers;
use App\Mail\PaymentMail;
use App\Models\Payment;
use App\Models\crequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function pay($id)
    {
        $pay = crequest::find($id);
        return view('paymentpage', ['pay' => $pay]);
    }



    public function afterPayment(Request $req)
    {
//        $data = crequest::find($id);
    }

        function save(Request $req)
        {
            $data = crequest::find($req->reqid);
            $data->status='Completed(Paid)';
            $data->save();
            $payment = new Payment();
            $payment->paymentid = $req->reqid;
            $payment->custname = $req->custname;
            $payment->staffname = $req->staffname;
            $payment->finalprice = $req->finalprice;


             $payment->save();
//            echo 'Payment Has been Received';
//            return view('home');

            \Stripe\Stripe::setApiKey('sk_test_51IyXIlJMVRphtGpAtQ7UFS4iKNoTYkqT7ZOt1pGdYcyrUNU3NLcwGcB928E5ps7zsb94pHLS9GIVHuyk8Pm9db9C00jvyb61tv');
            $method = \Stripe\PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => '4242424242424242',
                    'exp_month' => 12,
                    'exp_year' => 2024,
                    'cvc' => '314',
                ],
            ]);

            $amount =  $req->finalprice;
            $amount *= 100;
            $amount = (int) $amount;
            $custname = $req->custname;



            $payment_intent = \Stripe\PaymentIntent::create([
                'description' => 'Stripe Test Payment',
                'amount' => $amount,
                'currency' => 'MYR',
                'description' => 'Payment From '.$custname,
                'payment_method_types' => ['card'],
                'payment_method' => $method->id,

            ]);
            $intent = $payment_intent->client_secret;

            $lol = [
                'body' => $req->finalprice,
                'repair' => $data->repairdetails,
                'comment' => $data->comment,
                'staffincharge' => $data->staffincharge
            ];
            Mail::to($req->email)->send(new PaymentMail($lol));
            

            return redirect('viewcompletedrequests')->with('donepayment','Payment Has Been Received, Please Check Email For Invoice');


        }

}
