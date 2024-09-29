<?php

namespace App\Livewire;

use App\Models\User;
use App\services\PublicServices;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\File ;
class ChangeData extends Component
{
    use WithFileUploads;
    #[Validate]
    public $user;
    public $name,$email,$image;
    protected $rules = [
        'name' => ['required','min:12'],
        'email' => ['required', 'min:18'],
        'image'=>['nullable','mimes:jpg,jpeg,png']
    
         
    ];
 
    public function mount($user)
    {
        $this->user = User::findOrFail($user);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }
    public function update(PublicServices $service){
        $this->validate();
        if($this->image){
            if(File::exists(public_path('storage/'.$this->user->image))){
                File::delete(public_path('storage/'.$this->user->image));
             }
          
         $path = $service->UploadImage($this->image,'user/uploads/avaters/',400,400);
    
        }
        $this->user->update(
            [
                'name'=>$this->name,
                'email'=>$this->email,
                'image'=>$path??$this->user->image,
               
            ]
        );
        session()->flash('message','Data Updated Successfully');
        
        
        return false;
    }
    public function render()
    {

        return view('livewire.change-data',['user'=>$this->user]);
    }
}
