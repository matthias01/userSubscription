<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){
        return view('subscribe');
    }

    public function payment(Request $request){
       dd($request->all());

      \Stripe\Stripe::setApiKey( config('services.stripe.secret'));

        \Stripe\Charge::create([
        "amount" => 200,
        "currency" => "usd",
        "source" => "tok_visa", // obtained with Stripe.js
        "description" => "Charge for jenny.rosen@example.com"
        ]);
    }
}
