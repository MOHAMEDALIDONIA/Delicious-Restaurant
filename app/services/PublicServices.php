<?php 
namespace App\services;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class PublicServices{
    public function StoreData( $model , $request,$flodername='',$width=null,$height=null){
   
     //validation of request    
     $validated=$request->validated();
      if($validated){
        if(isset( $validated['image'])){
            //upload image
          $validated['image'] =  $this->UploadImage($request->file('image'),$flodername,$width,$height);
        }
         if($request->has('status')){
              //insert status
              $validated['status'] = $request->has('status') ? 1 : 0;
         }
           
      
        $model::create($validated);
      }else{
        return redirect()->back()->with('error','Something is Wrong!');
      }  
      
    }
    public function UpdateData($model,$id,$request,$flodername='',$width=null,$height=null){
        //table of batabase
        $table = $model->getTable();
        //check item exists or not
          $item = $model::findOrFail($id);
          if(!$item){
            return redirect()->back();
          }
         //validation of request
            
         $validated=$request->validated();

         if(Schema::hasColumn($table,'image')){
              //if request exists in image delete from folder and add new photo
                if($request->hasFile('image')){
                    if(File::exists(public_path('storage/'.$item->image))){
                        File::delete(public_path('storage/'.$item->image));
                    }
                    $image=$this->UploadImage($request->file('image'),$flodername,$width,$height); 
                    
                }
                //insert image to request
                $validated['image']=$image ?? $item->image;
           
         }
       
        if(Schema::hasColumn($table,'status')){
          //if model exists in status
          $validated['status'] = $request->has('status') ? 1 : 0;
        }
         
        //update database
        $item->update($validated);
    }
    public function UploadImage($file,$flodername,$width=400,$height=400){
        $manager = new ImageManager(new Driver());
        //fetch image from request
       
        $ext=time().$file->getClientOriginalName();
        //resize image
        $img = $manager->read($file);
        $img = $img->resize($width,$height);
        //save image in folder
        $img=$img->toJpeg(80)->save(public_path('/storage/'.$flodername.'/'.$ext));
        $path = $flodername.'/'.$ext;
        return $path;
        
        
    }

    
}