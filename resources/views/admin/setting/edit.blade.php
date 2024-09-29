@extends('layouts.admin')
@section('title','Edit Settings')
@section('content')
<div class="pagetitle">
    <h1>Settings Table</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('setting.admin.view')}}">Settings</a></li>
        <li class="breadcrumb-item"><a href="{{route('setting.admin.edit')}}">Edit Settings</a></li>

    </ol>
    </nav>
</div><!-- End Page Title -->
@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-1"></i>
     {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
 
@endif 
{{-- start chef create form --}}
<div class="col-lg-12"> 
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Edit Settings</h5>
        <hr>

        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" action="{{route('setting.admin.update')}}"  method="POST" >
            @csrf
            @method('PUT')
            <h2 class="text-primary text-center">Information Website</h2>
            <div class="col-md-6">
                <label  class="form-label">Website Name</label>
                <input type="text" class="form-control" value="{{$setting->website_name ?? ''}}" name="website_name" required>
                
                    @error('website_name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Email</label>
                <input type="text" class="form-control" value="{{$setting->email ?? ''}}" name="email" required>
                
                    @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Phone</label>
                <input type="text" class="form-control" value="{{$setting->phone ?? ''}}" name="phone" required>
                
                    @error('phone')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Time Work</label>
                <input type="text" class="form-control" value="{{$setting->time_work ?? ''}}" name="time_work" required>
                
                    @error('time_work')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-12">
                <label  class="form-label">Address</label>
                <input type="text" class="form-control" value="{{$setting->address ?? ''}}" name="address" required>
                    @error('address')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            
            <h2 class="text-primary text-center">Social Madia</h2>
            <div class="col-md-6">
                <label  class="form-label">Facebook</label>
                <input type="text" class="form-control" value="{{ $setting->facebook ?? ''}}" name="facebook">
                
                    @error('facebook')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Instagram</label>
                <input type="text" class="form-control" value="{{$setting->instagram ?? ''}}" name="instagram" >
                
                    @error('instagram')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Twitter</label>
                <input type="text" class="form-control" value="{{ $setting->twitter ?? ''}}" name="twitter" >
                
                    @error('twitter')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Linkedin</label>
                <input type="text" class="form-control" value="{{$setting->linkedin ?? ''}}" name="linkedin" >
                
                    @error('linkedin')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            
            <h2 class="text-primary text-center">About Section</h2>
            <div class="col-md-12">
                <label  class="form-label">Description</label>
                <textarea name="description" id="" class="form-control" cols="30" rows="10">{{$setting->description ?? ''}}</textarea>
                
                    @error('description')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Video Url</label>
                <input type="text" class="form-control" value="{{$setting->video_url ?? ''}}" name="video_url">
                 
                   if you want to watch vedio  ,<a href="{{$setting->video_url ?? '#'}}" class="glightbox pulsating-play-btn" style="color:orange;">click here</a>
                
                    @error('video_url')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-12">
            <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form><!-- End setting edit form  -->

        </div>
    </div>
</div>
@endsection