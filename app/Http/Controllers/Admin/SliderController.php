<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequestForm;
use App\Models\Slider;
use App\services\PublicServices;

class SliderController extends Controller
{ 
    protected $Service;

    public function __construct(PublicServices $Service)
    {
        $this->Service = $Service;
    }
    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create(){
        return view('admin.slider.create');
    }
    public function store(SliderRequestForm $request ){
        
       //insert data to slider table
       $this->Service->StoreData(Slider::class,$request,'admin/uploads/slider',1920,1123);
       return redirect()->back()->with('message','Add Slider Successfully ');
    }
    public function edit(int $slider_id){
       $slider = Slider::findOrFail($slider_id);
       if(!$slider){
         return redirect()->back();
       }
       return view('admin.slider.edit',compact('slider'));
    }
    public function update(SliderRequestForm $request,int $slider_id){
   
      $this->Service->UpdateData( new \App\Models\Slider,$slider_id,$request,'admin/uploads/slider',1920,1123);
      return redirect()->back()->with('message','Update Slider Successfully ');
    
    }
    public function destory(int $slider_id){
       Slider::findOrFail($slider_id)->delete();
       return redirect()->back()->with('message','Deleted Slider Successfully ');
    }
}
