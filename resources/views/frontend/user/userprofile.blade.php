@extends('layouts.app')
@section('title','Profile')
@section('content')
<div class="profile-container" style="margin-top: 150px;margin-bottom:150px;">
    <img src="{{asset('storage/'.$user->image)}}" alt="User Image" class="profile-image">
    <div class="d-flex justify-content-center" id="feedback-form-wrapper">

        <button type="button" class="btn  btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: #ffffff; background: #ffb03b;">
            Feedback
        </button>
        <div id="feedback-form-modal">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Feedback Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">How likely you would like to recommand us to your friends?</label>
                        <div class="rating-input-wrapper d-flex justify-content-between mt-3">
                          <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">1</span></label>
                          <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">2</span></label>
                          <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">3</span></label>
                          <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">4</span></label>
                          <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">5</span></label>

            
                        </div>
                        <div class="rating-labels d-flex justify-content-between mt-2">
                          <label>Very unlikely</label>
                          <label>Very likely</label>
                        </div>
                      </div>
                   
                      <div class="form-group">
                        <label for="input-two">Would you like to say something?</label>
                        <textarea class="form-control mt-2" id="input-two" rows="4"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send Feedback</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="profile-name">{{$user->name}}</div>
    <div class="profile-email">{{$user->email}}</div>
    <div class="profile-buttons">
        <a href="{{route('edit.userprofile',$user->id)}}" class="btn btn-secondary btn-sm">Edit Profile</a>
        <a href="{{route('user.orders.view')}}" class="btn btn-primary btn-sm">View Orders</a>
        <a href="{{route('user.reservations.view')}}" class="btn btn-danger btn-sm">View Reservations</a>
     
    </div>
  
</div>

@endsection    
