<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequestForm;
use App\Models\Event;
use App\services\PublicServices;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $Service;

    public function __construct(PublicServices $Service)
    {
        $this->Service = $Service;
    }
    public function index(){
        $events = Event::all();
        return view('admin.event.index',compact('events'));
    }
    public function create(){
        
        return view('admin.event.create');
    }
    public function store(EventRequestForm $request){
      
       //insert data to events table
       $this->Service->StoreData(Event::class,$request,'admin/uploads/events',1024,683);
       return redirect()->back()->with('message','Add Event Successfully ');
    }
    public function edit(int $event_id){
       $event = Event::findOrFail($event_id);
       if(!$event){
         return redirect()->back();
       }

       return view('admin.event.edit',compact('event'));
    }
    public function update(EventRequestForm $request,int $event_id){
   
      $this->Service->UpdateData( new \App\Models\Event,$event_id,$request,'admin/uploads/events',1024,683);
      return redirect()->back()->with('message','Update Event Successfully ');
    
    }
    public function destory(int $event_id){
       Event::findOrFail($event_id)->delete();
       return redirect()->back()->with('message','Deleted Event Successfully ');
    }
}
