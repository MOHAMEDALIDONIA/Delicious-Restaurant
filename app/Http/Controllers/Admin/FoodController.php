<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRequestForm;
use App\Models\Category;
use App\Models\Food;
use App\services\PublicServices;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    protected $Service;

    public function __construct(PublicServices $Service)
    {
        $this->Service = $Service;
    }
    public function index(){
        $food = Food::all();
        return view('admin.Food.index',compact('food'));
    }
    public function create(){
        $categories = Category::where('status','0')->get();
        return view('admin.Food.create',compact('categories'));
    }
    public function store(FoodRequestForm $request ){
        
       //insert data to Food table
       $this->Service->StoreData(Food::class,$request,'admin/uploads/food',500,500);
       return redirect()->back()->with('message','Add Food Successfully ');
    }
    public function edit(int $Food_id){
       $food = Food::findOrFail($Food_id);
       if(!$food){
         return redirect()->back();
       }
       $categories = Category::where('status','0')->get();
       return view('admin.Food.edit',compact('food','categories'));
    }
    public function update(FoodRequestForm $request,int $food_id){
   
      $this->Service->UpdateData( new \App\Models\Food,$food_id,$request,'admin/uploads/food',500,500);
      return redirect()->back()->with('message','Update Food Successfully ');
    
    }
    public function destory(int $food_id){
       Food::findOrFail($food_id)->delete();
       return redirect()->back()->with('message','Deleted Food Successfully ');
    }
}
