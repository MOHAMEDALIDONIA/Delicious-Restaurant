<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequestForm;
use App\Models\Table;
use App\services\PublicServices;
use Illuminate\Http\Request;

class TableController extends Controller
{
    protected $Service;

    public function __construct(PublicServices $Service)
    {
        $this->Service = $Service;
    }
    public function index(){
        $tables = Table::all();
        return view('admin.tables.index',compact('tables'));
    }
    public function create(){
        return view('admin.tables.create');
    }
    public function store(TableRequestForm $request ){
        
       //insert data to table
       $this->Service->StoreData(Table::class,$request);
       return redirect()->back()->with('message','Add Table Successfully ');
    }
    public function edit(int $table_id){
       $table = Table::findOrFail($table_id);
       if(!$table){
         return redirect()->back();
       }
       return view('admin.tables.edit',compact('table'));
    }
    public function update(TableRequestForm $request,int $table_id){
   
      $this->Service->UpdateData( new \App\Models\Table,$table_id,$request);
      return redirect()->back()->with('message','Update Table Successfully ');
    
    }
    public function destory(int $table_id){
       Table::findOrFail($table_id)->delete();
       return redirect()->back()->with('message','Deleted Table Successfully ');
    }
}
