<?php
namespace App\services;

use App\Models\Gallery;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
class GalleryServices{
    public function UploadImages(array $images,$flodername,$width=400,$height =400){
        $manager = new ImageManager(new Driver());
        foreach($images as $image){
           //fetch image from request
            $file = $image;
            $ext=time().$file->getClientOriginalName();
            //resize image
            $img = $manager->read($file);
            $img = $img->resize($width,$height);
            //save image in folder
            $img=$img->toJpeg(80)->save(public_path('/storage/'.$flodername.'/'.$ext));
            $path = $flodername.'/'.$ext;
            //insert images to database
            Gallery::create([
               'image'=>$path
            ]);
        }
    }
    public function DistroyGallery(int $image_id){
      //fetch row from database table is gallery
      $ImageGallery = Gallery::findOrFail($image_id);
      //delete image from folder 
      if(File::exists(public_path('storage/'.$ImageGallery->image))){
        File::delete(public_path('storage/'.$ImageGallery->image));
      }
      //delete row from database
      $ImageGallery->delete();
    }
    public function UpdateImageGallery(int $image_id, $request){
        //object from class publicservices
        $upload = new PublicServices;
      
        //fetch row from datadase table is gallery
        $item = Gallery::findOrFail($image_id);
        //delete old image from folder
        if(File::exists(public_path('storage/'.$item->image))){
            File::delete(public_path('storage/'.$item->image));
        } 
        //upload new image
        $image = $upload->UploadImage($request->file('image'),'admin/uploads/gallery',800,600);
        //update database
        $item->update([
            'image' => $image ?? $item->image
          ]);
        //return image
        return $image;  
    }
}