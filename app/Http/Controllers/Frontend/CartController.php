<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function AddToCart($food_id,Request $request){
        
        if (Auth::check()) {
            $cart=Cart::where('user_id',auth()->user()->id)->where('food_id',$food_id);
           if($cart->exists()){
             return response()->json(['status' => 'exists']);
           }else{
            Cart::create([
                'user_id'=>auth()->user()->id,
                'food_id'=>$food_id,
                'quantity'=>$request->quantity
            ]);
            return response()->json(['status' => 'added']);
           }
            
        } else {
            return response()->json(['status' => 'login']);
        }
        

    }
    public function cartview(){
        return view('frontend.cart.view');
    }
}
