<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequestForm;
use App\Models\Cart;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Order;
use App\Models\OrderItem;
use App\services\PublicServices;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutview(){
        $cart = Cart::where('user_id',auth()->user()->id)->get();
        if($cart->count() == 0){
            return redirect()->back();
        }
        return view('frontend.checkout.view');
    }
    public function store(CheckoutRequestForm $request){
        $validation = $request->validated();
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'Mo-HH'.random_int(1000,30000),
            'fullname'=>$validation['fullname'],
            'phone'=>$validation['phone'],
            'address'=>$validation['address'],
            'status'=>'In Progress',
            'instructions'=>$validation['instructions'] ?? 'no instructions',
        ]);
        foreach($carts as $cartitem){
            OrderItem::create([
                'order_id' =>$order->id,
                'food_id' =>$cartitem->food_id,
                'quantity' =>$cartitem->quantity,
                'price'=>$cartitem->food->price,
            ]);
        }
      if(Cart::where('user_id',auth()->user()->id)->count()>0){
        Cart::where('user_id',auth()->user()->id)->delete();
      }
       Alert::success('the order will arrive after half an hour from now')->showCloseButton()->buttonsStyling(true)->autoClose(10000);
       return redirect('/');
       
    }
}
