@extends('layouts.admin')
@section('title','Edit Chef')
@section('content')
<div class="pagetitle">
    <h1>Chef Table</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('chef.admin.view')}}">Chef</a></li>
        <li class="breadcrumb-item"><a href="{{route('chef.admin.create')}}">Edit Chef</a></li>

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
        <h5 class="card-title">Edit Chef</h5>
        

        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" action="{{route('chef.admin.update',$chef->id)}}"  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label  class="form-label">Name</label>
                <input type="text" class="form-control" value="{{$chef->name}}" name="name" required>
                
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Tilte</label>
                <input type="text" class="form-control" value="{{$chef->title}}" name="title" required>
                
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
                 @if ($chef->image != null)
                     <img src="{{asset('storage/'.$chef->image)}}" alt="" style="width:150px;height:90px;">
                 @endif
                
                    @error('image')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Facebook</label>
                <input type="text" class="form-control" value="{{$chef->facebook != null ? $chef->facebook : ''}}" name="facebook">
                
                    @error('facebook')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Instagram</label>
                <input type="text" class="form-control" value="{{$chef->instagram != null ? $chef->instagram : ''}}" name="instagram" >
                
                    @error('instagram')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Twitter</label>
                <input type="text" class="form-control" value="{{$chef->twitter != null ? $chef->twitter : ''}}" name="twitter" >
                
                    @error('twitter')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Linkedin</label>
                <input type="text" class="form-control" value="{{$chef->linkedin != null ? $chef->linkedin : ''}}" name="linkedin" >
                
                    @error('linkedin')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
           
            <div class="col-12">
            <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form><!-- End chef create form  -->

        </div>
    </div>
</div>
@endsection