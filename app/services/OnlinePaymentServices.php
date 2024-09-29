<?php 
namespace App\services;
use Stripe;
use App\Models\Booking;
use App\Models\Transaction;
use RealRashid\SweetAlert\Facades\Alert;
class OnlinePaymentServices{
  public function PaymentRequest($request){
    //add apikey to request
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //add information to request and return response
    $response= Stripe\Charge::create ([
        "amount" => $request->value * 100,
        "currency" => "usd",
        "source" => $request->stripeToken,
        "description" => "Online Payment" 
    ]);
    return $response;
  }
  public function BookTable($response_of_payment,$request){
     if(Booking::where('day_booking',$request['day_booking'])
     ->where('time_booking',$request['time_booking'])
     ->where('table_id',$request['table_id'])->exists()){
        Alert::info('This table is already reserved at the same time')->showCloseButton()->buttonsStyling(true)->autoClose(10000);
        return redirect('/#book-a-table');
     }else{
        //book table and insert data to booking table
        Booking::create([
            'user_id'=>auth()->user()->id,
            'phone'=>$request['phone'],
            'number_people'=>$request['number_people'],
            'table_id'=>$request['table_id'],
            'message'=>$request['message'],
            'day_booking'=>$request['day_booking'],
            'time_booking'=>$request['time_booking'],
          ]);
             //insert process to transactions table
            Transaction::create([
            'user_id'=>auth()->user()->id,
            'process_id'=>$response_of_payment->payment_method,
            'value'=>$response_of_payment->amount/100,
            'type'=>'Booking'
            ]);
            Alert::success('Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!')->showCloseButton()->buttonsStyling(true)->autoClose(10000);
            return redirect('/#book-a-table');
     }
  }
}