<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\User;
use Livewire\Component;

class CartView extends Component
{
    public $cartlist,$TotalPrice=0 ,$user;
    public function decrementQuantity(int $cart_id)  {
        $cartitem = Cart::where('id',$cart_id)->where('user_id',auth()->user()->id)->first();
        if ($cartitem) {
          if($cartitem->quantity <= 0){
                    session()->flash('error',"i can't decrement any more ");
                   return false;
            }
                $cartitem->decrement('quantity');
                 session()->flash('message','Quantity Updated');
                 return false;
            } else {
            session()->flash('error','Something Went Wrong!');
            return false;
        }
    
        
    }
    public function incrementQuantity(int $cart_id)  {
       $cartitem = Cart::where('id',$cart_id)->where('user_id',auth()->user()->id)->first();
    
        if ($cartitem) {
               $cartitem->increment('quantity');
                session()->flash('message','Quantity Updated');
                return false;    
        } else {
            
            session()->flash('error','Something Went Wrong!');
            return false;
        }
    
        
    }
    public function removeCartItem(int $cart_id){
        $cartitemremove= Cart::where('id',$cart_id)->where('user_id',auth()->user()->id)->first();
        if ($cartitemremove) {
            $cartitemremove->delete();
            session()->flash('message','cart deleted Successfully');
            return false;
        } else {
            session()->flash('error','Something Went Wrong!');
            return false;
        }
        
     

    }
    public function render() {
        $this->cartlist = Cart::where('user_id',auth()->user()->id)->get();
        $this->user =User::where('id',auth()->user()->id)->first();
        return view('livewire.cart-view',
        [
            'cartlist'=>$this->cartlist,
            'user'=>$this->user
        ]);
    }
}
