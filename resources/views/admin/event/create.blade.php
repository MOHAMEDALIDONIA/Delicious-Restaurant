@extends('layouts.admin')
@section('title','Add Event')
@section('content')
<div class="pagetitle">
    <h1>Add Event</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('event.admin.view')}}">Event</a></li>
        <li class="breadcrumb-item"><a href="{{route('event.admin.create')}}">Add Event</a></li>

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
{{-- start Event create form --}}
<div class="col-lg-12"> 
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Add Event</h5>
        

        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" action="{{route('event.admin.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label  class="form-label">Title</label>
                <input type="text" class="form-control" name="title" required>
                
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Price</label>
                <input type="text" class="form-control" name="price" required>
                
                    @error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-12">
                <label  class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
                
                    @error('image')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-12">
                <label  class="form-label">Description</label>
                 <textarea  class="form-control" name="description" required></textarea>
                 @error('description')
                  <small class="form-text text-danger">{{$message}}</small>
                 @enderror
             </div>
            <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="status" >
                <label class="form-check-label" for="invalidCheck">
                   Unchecked->visable / Checked->hidden
                </label>
               
            </div>
            </div>
            <div class="col-12">
            <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form><!-- End Event create form  -->

        </div>
    </div>
</div>
@endsection