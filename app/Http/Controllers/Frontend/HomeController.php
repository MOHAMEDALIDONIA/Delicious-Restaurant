<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequestForm;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\Food;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Slider;
use App\Models\Table;
use App\Models\Transaction;
use App\services\OnlinePaymentServices;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status',0)->get();
        $chefs = Chef::all();
        $galleries = Gallery::all();
        $categories =Category::with('food')->where('status','0')->get();
        $events=Event::where('status','0')->get();
        $tables=Table::all();
        $feedbacks = Feedback::with('user')->where('status',0)->get();
        $today =Carbon::now()->format('Y-m-d');
        $Add_Week_To_Today = Carbon::now()->addWeek()->format('Y-m-d');
        return view('frontend.welcome',compact('sliders','chefs','galleries','categories'
                                               ,'events','tables','feedbacks'
                                               ,'today','Add_Week_To_Today'));
    }
    public function BookingTable(BookingRequestForm $request , OnlinePaymentServices $service){
        if (Auth::check()) {
            //validate request
            $validation = $request->validated();
            //payonline 
            $responsepayment= $service-> PaymentRequest($request);
            //check table is reserved or not and insert data if it is not reserved
          $response=  $service->BookTable($responsepayment,$validation);
           return $response;
        }else {
            Alert::info('Please,Login To Continue')->showCloseButton()->buttonsStyling(true)->autoClose(10000);
            return redirect('/#menu');
        }
 
    }
    public function test(){
        $reservedTableIds = Booking::where('day_booking', '2024-09-09')
        ->whereTime('time_booking', '<=', '24:00:00')
        ->pluck('table_id');
        $availableTables = Table::whereNotIn('id', $reservedTableIds)->get();
    
        $tables=Table::all();
        return view('test' ,compact('tables'));
    }
    public function GetAvailableTable(Request $request){
        $day = $request->input('day_booking');
        $table_id = $request->input('table_id');
        $availableTimes = [];
    
        // Assuming time slots from 8:00 AM to 12:00 PM with 2-hour intervals
        $start = Carbon::createFromTime(8, 0);
        $end = Carbon::createFromTime(24, 0); // Until 12:00 AM
    
        // Get reservations for the selected table and day
        $reservations = Booking::where('table_id', $table_id)
                                    ->where('day_booking', $day)
                                    ->get();
    
        while ($start->lessThan($end)) {
            $slot = $start->format('H:i');
    
            // Check if the time slot is available for the selected table
            $isAvailable = !$reservations->contains(function ($reservation) use ($start) {
                return Carbon::parse($reservation->time_booking)->eq($start);
            });
    
            if ($isAvailable) {
                $availableTimes[] = $slot;
            }
    
            $start->addHours(2);
        }
    
        return response()->json($availableTimes);
    }
}
