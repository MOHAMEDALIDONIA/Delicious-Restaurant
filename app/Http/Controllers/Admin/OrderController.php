<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $today = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null,function($q) use($request){
             return $q->whereDate('created_at',$request->date);
        },function($q) use($today){
            return $q->whereDate('created_at',$today);
        })->when($request->status != null,function($q) use($request){
            return $q->where('status',$request->status);
        })->paginate(3);
        return view('admin.orders.index',compact('orders'));
    }
    public function OrderToday(){
        $today = Carbon::now()->format('Y-m-d');
        $orders = Order::whereDate('created_at','=',$today)->where('status','In Progress')->get();
        return view('admin.orders.ordertoday',compact('orders'));
    }
    public function UpdateOrderStatus(int $order_id,Request $request){
        $order = Order::findOrFail($order_id);
        $order->update([
            'status'=>$request->status
        ]);
      return response()->json(['message'=>'Change Status Successfully']);
    }
}
