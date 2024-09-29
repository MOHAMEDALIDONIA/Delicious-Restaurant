<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Order;
use App\Models\OrderItem;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ProfileView(){
        $user=User::where('id',auth()->user()->id)->first();
        return view('frontend.user.userprofile',compact('user'));
    }
    public function EditProfile(int $user_id){
        if($user_id != auth()->user()->id){
                return redirect()->back();
        }
        $user =User::findOrFail($user_id);
        return view('frontend.user.edituserprofile',compact('user'));
    }
    public function ChangePassword(){
         return view('frontend.user.changepassword');
    }
    public function UserOrders(){
        $orders = Order::where('user_id',auth()->user()->id)->get();
        return view('frontend.user.orders',compact('orders'));
    }
    public function UserReservations(){
        $reservations = Booking::where('user_id',auth()->user()->id)->get();
        return view('frontend.user.reservations',compact('reservations'));
    }
    public function Reorder(int $order_id){
       $order = Order::findOrFail($order_id);
    
      $neworder= Order::create([
         'user_id'=>auth()->user()->id,
         'tracking_no' => 'Mo-HH'.random_int(1000,30000),
         'fullname'=>$order->fullname,
         'phone'=>$order->phone,
         'address'=>$order->address,
         'status'=>'In Progress',
         'instructions'=>$order->instructions ?? 'no instructions'
       ]);
       foreach($order->orderitem as $item){
            OrderItem::create([
                'order_id' =>$neworder->id,
                'food_id' =>$item->food_id,
                'quantity' =>$item->quantity,
                'price'=>$item->food->price,
            ]);
      }
      Alert::success('Successfully Reorder')->showCloseButton()->buttonsStyling(true)->autoClose(10000);
      return redirect()->back();
    }
}
