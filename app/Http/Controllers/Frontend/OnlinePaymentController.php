<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\services\OnlinePaymentServices;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Session;
use Stripe;
use Stripe\Stripe as StripeStripe;

class OnlinePaymentController extends Controller
{
        /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('checkout');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request, OnlinePaymentServices $service){
       $response=$service->PaymentRequest($request); 
       dd($response);
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
