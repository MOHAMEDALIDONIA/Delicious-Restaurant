<form class="form-horizontal" wire:submit="update" enctype="multipart/form-data">
    <div class="panel panel-default">
      <div class="panel-body text-center mt-3">
       <img src="{{asset('storage/'.$user->image)}}" class="profile-image" alt="User avatar">
      </div>
    </div>
  <div class="panel panel-default">
    <div class="panel-heading">
        <div class="d-flex justify-content-center mt-2">
            <h4 style="color: #ffb03b;">User info</h4>
           
          </div>
          @if (session('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
             {{session('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
    </div>
    <div class="panel-body">
      <div class="form-group">
        <label class="control-label">Name</label>
        <div class="col-sm-10">
          <input type="text" wire:model.defer="name" value="{{$user->name}}" id="" class="form-control">
        </div>
        @error('name') <small class="text-danger">{{$message}}</small>   @enderror
      </div>
      <div class="form-group">
        <label class=" control-label">Email</label>
        <div class="col-sm-10">
          <input type="text"wire:model.defer="email" value="{{$user->email}}" class="form-control">
        </div>
        @error('email') <small class="text-danger">{{$message}}</small>   @enderror
      </div>
      <div class="form-group">
        <label class=" control-label">Image</label>
        <div class="col-sm-10">
          <input type="file" wire:model.defer="image" class="form-control">
        </div>
        @error('image') <small class="text-danger">{{$message}}</small>   @enderror
      </div>
      <div  style="margin:5px;">
        
        <a style="text-decoration:underline;color:steelblue;" href="{{route('change.password')}}">
         Change Password?
        </a>
      </div>
      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2" style="margin-bottom: 10px;">
          <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i>Update</button>
          
        </div>
      </div>
    </div>
  </div>
</form>
