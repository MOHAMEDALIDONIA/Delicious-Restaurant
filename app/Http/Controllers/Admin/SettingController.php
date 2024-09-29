<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequestForm;
use App\Http\Requests\SettingRequestForm;
use App\Models\Gallery;
use App\Models\Setting;
use App\services\GalleryServices;
use App\services\PublicServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    protected $services;

    public function __construct(GalleryServices $services)
    {
       $this->services = $services;
    }
    public function index(){
        $setting = Setting::first();
        $galleries = Gallery::all();
        return view('admin.setting.index',compact('setting','galleries'));
    }
    public function edit(){
        $setting = Setting::first();
        return view('admin.setting.edit',compact('setting'));
    }
    public function update(SettingRequestForm $request){
      $vaildated = $request->validated();
      $setting = Setting::first();
      if($setting){
            //update data
            $setting->update($vaildated);
            return redirect()->back()->with('message','settings updated');

        }else{
            //create data
            Setting::create($vaildated);
            return redirect()->back()->with('message','settings created');
      }
      
    }
    public function StoreGallery(GalleryRequestForm $request){
       $vaildated=$request->validated();
       $this->services->UploadImages($vaildated['image'],'admin/uploads/gallery',800,600);
       return redirect()->back()->with('message','Images Upload Successfully');
    }
    public function DeleteGalleryImage($image_id){
     $this->services->DistroyGallery($image_id);
      return response()->json(['message'=>'Image Deleted Successfully','id'=>$image_id]) ;
    }
    public function UpdateGalleryImage(int $image_id ,Request $request , PublicServices $upload){
      //validation request
      $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
      ]);
      if($request->hasFile('image')){
        $image = $this->services->UpdateImageGallery($image_id,$request);
        return response()->json(['message'=>'Image updated Successfully','id'=>$image_id,'image'=>$image]) ;
      }else{
        return response()->json(['message'=>'No Image Upload ']) ;
      }  
    }
}
