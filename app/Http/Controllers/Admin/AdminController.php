<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ViewProfile(){
        $admin= Admin::where('id',auth()->guard('admin')->user()->id)->first();
        return view('admin.auth.profile',compact('admin'));
    }
}
