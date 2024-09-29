<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequestForm;
use App\Models\Feedback;
use App\services\PublicServices;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    public function SendFeedback(FeedbackRequestForm $request){
       $validated=$request->validated();
       Feedback::create([
          'user_id'=>auth()->user()->id,
          'rate'=>$validated['rate'],
          'message'=>$validated['message']
       ]);
       Alert::success('Thank You For Feedback')->showCloseButton()->buttonsStyling(true)->autoClose(10000);
       return redirect()->back();
    }
}
