

<div class="container bootstrap snippets bootdeys" style="margin-top: 100px;margin-bottom:100px;">
<div class="row d-flex justify-content-center">
  <div class="col-xs-12 col-sm-9">
    <form class="form-horizontal" wire:submit="update">
      <div class="panel panel-default">
        <div class="panel-heading">
            <div class="d-flex justify-content-center mt-2">
                <h4 style="color: #ffb03b;">Change Password</h4>
               
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
            <label class="control-label">Current Password</label>
            <div class="col-sm-12">
              <input type="password" wire:model.defer="current_password"  id="" class="form-control">
            </div>
            @error('current_password') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group">
            <label class=" control-label">New Password</label>
            <div class="col-sm-12">
              <input type="password" wire:model.defer="password"  class="form-control">
            </div>
            @error('password') <small class="text-danger">{{$message}}</small>   @enderror
          </div>
          <div class="form-group">
            <label class=" control-label">Password Confirm</label>
            <div class="col-sm-12">
              <input type="password" wire:model.defer="password_confirmation"  class="form-control">
            </div>
            @error('password') <small class="text-danger">{{$message}}</small>   @enderror
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2" style="margin-bottom: 10px;">
                <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i>Update</button>
              
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

