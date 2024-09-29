<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChefRequestForm;
use App\Models\Chef;
use App\services\PublicServices;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    protected $Service;
    public function __construct(PublicServices $Service)
    {
        $this->Service =$Service;
    }
    public function index(){
        $chefs = Chef::all();
        return view('admin.chef.index',compact('chefs'));
    }
    public function create(){
        return view('admin.chef.create');
    }
    public function store(ChefRequestForm $request ){
        
       //insert data to Category table
       $this->Service->StoreData( new \App\Models\Chef,$request,'admin/uploads/chefs',600,600);
       return redirect()->back()->with('message','Add Chef Successfully ');
    }
    public function edit(int $chef_id){
       $chef = Chef::findOrFail($chef_id);
       if(!$chef){
         return redirect()->back();
       }
       return view('admin.chef.edit',compact('chef'));
    }
    public function update(ChefRequestForm $request,int $chef_id){
  
      $this->Service->UpdateData( new \App\Models\Chef,$chef_id,$request,'admin/uploads/chefs',600,600);
      return redirect()->back()->with('message','Update Chef Successfully ');
    
    }
    public function destory(int $chef_id){
       Chef::findOrFail($chef_id)->delete();
       return redirect()->back()->with('message','Deleted Chef Successfully ');
    }
}
