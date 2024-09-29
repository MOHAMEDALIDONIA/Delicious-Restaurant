<?php

namespace App\Livewire;

use App\Models\Feedback;
use Livewire\Component;

class FeedbackTable extends Component
{
    public function editstatus(int $feedback_id){
        $feedback = Feedback::findOrFail($feedback_id);
        $feedback->update([
          'status'=>$feedback->status == 1 ? 0:1
        ]);
        session()->flash('message','update status sucessfully');
        return false;
    }
    public function deletefeedback(int $feedback_id){
        Feedback::findOrFail($feedback_id)->delete();
        session()->flash('message','Delete Feedback sucessfully');
        return false;
    }
    public function render()
    {
        $Feedbacks = Feedback::orderBy('id', 'desc')->get();
        return view('livewire.feedback-table',[
            'Feedbacks'=>$Feedbacks
        ]);
    }
}
