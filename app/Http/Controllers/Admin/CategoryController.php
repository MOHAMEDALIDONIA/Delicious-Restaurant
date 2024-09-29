<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequestForm;
use App\Models\Category;
use App\services\PublicServices;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $Service;
    public function __construct(PublicServices $Service)
    {
        $this->Service =$Service;
    }
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(CategoryRequestForm $request ){
        
       //insert data to Category table
       $this->Service->StoreData( new \App\Models\Category,$request);
       return redirect()->back()->with('message','Add Category Successfully ');
    }
    public function edit(int $Category_id){
       $category = Category::findOrFail($Category_id);
       if(!$category){
         return redirect()->back();
       }
       return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryRequestForm $request,int $category_id){
  
      $this->Service->UpdateData( new \App\Models\Category,$category_id,$request);
      return redirect()->back()->with('message','Update Category Successfully ');
    
    }
    public function destory(int $Category_id){
       Category::findOrFail($Category_id)->delete();
       return redirect()->back()->with('message','Deleted Category Successfully ');
    }
}
