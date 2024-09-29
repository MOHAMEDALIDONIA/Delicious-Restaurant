@extends('layouts.admin')
@section('title','Add Chef')
@section('content')
<div class="pagetitle">
    <h1>Chef Table</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('chef.admin.view')}}">Chef</a></li>
        <li class="breadcrumb-item"><a href="{{route('chef.admin.create')}}">Add Chef</a></li>

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
        <h5 class="card-title">Add Chef</h5>
        

        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" action="{{route('chef.admin.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label  class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
                
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Tilte</label>
                <input type="text" class="form-control" name="title" required>
                
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
                
                    @error('image')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Facebook</label>
                <input type="text" class="form-control" name="facebook">
                
                    @error('facebook')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Instagram</label>
                <input type="text" class="form-control" name="instagram">
                
                    @error('instagram')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Twitter</label>
                <input type="text" class="form-control" name="twitter" >
                
                    @error('twitter')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Linkedin</label>
                <input type="text" class="form-control" name="linkedin">
                
                    @error('linkedin')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
           
            <div class="col-12">
            <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form><!-- End chef create form  -->

        </div>
    </div>
</div>
@endsection