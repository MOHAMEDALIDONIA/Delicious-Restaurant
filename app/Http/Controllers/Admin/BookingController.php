<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminBookingRequestForm;
use App\Http\Requests\BookingRequestForm;
use App\Models\Booking;
use App\services\PublicServices;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $Service;

    public function __construct(PublicServices $Service)
    {
        $this->Service = $Service;
    }
    public function index(Request $request){
        $today = Carbon::now()->format('Y-m-d');
        $Reservations = Booking::when($request->date != null,function ($q) use($request){
                                return $q->where('day_booking',$request->date)->orderBy('time_booking', 'asc');
                          },function ($q) use($today){
                                return $q->where('day_booking',$today)->orderBy('time_booking', 'asc');
                     })->get();
        return view('admin.booking.index',compact('Reservations'));
    }
    public function edit(int $Reservation_id){
       $Reservation = Booking::findOrFail($Reservation_id);
       if(!$Reservation){
         return redirect()->back();
       }
       return view('admin.booking.edit',compact('Reservation'));
    }
    public function update(AdminBookingRequestForm $request,int $Reservation_id){
      if (Booking::where('day_booking',$request->day_booking)
      ->where('time_booking',$request->time_booking)
      ->where('number_table',$request->number_table)
      ->exists()) {
        $Reservation =Booking::findOrFail($Reservation_id);
        $Reservation->update([
            'phone'=>$request->phone,
            'number_people'=>$request->number_people,
            'message'=>$request->message,
           
        ]);
        return redirect()->back()->with('message','This table is already reserved at the same time');
      } else {
        $this->Service->UpdateData( new \App\Models\Booking,$Reservation_id,$request);

        return redirect()->back()->with('message','Updated Your reservation  successfully');
      }
      

    
    }
    public function destory(int $slider_id){
       Booking::findOrFail($slider_id)->delete();
       return redirect()->back()->with('message','Deleted Slider Successfully ');
    }
}
