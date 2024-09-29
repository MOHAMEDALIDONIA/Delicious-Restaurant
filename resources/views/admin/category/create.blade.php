@extends('layouts.admin')
@section('title','Add Category')
@section('content')
<div class="pagetitle">
    <h1>Category Table</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('category.admin.view')}}">Category</a></li>
        <li class="breadcrumb-item"><a href="{{route('category.admin.create')}}">Add Category</a></li>

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
{{-- start category create form --}}
<div class="col-lg-12"> 
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Add Category</h5>
        

        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" action="{{route('category.admin.store')}}"  method="POST" >
            @csrf
            <div class="col-md-12">
                <label  class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
                
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-12">
                <label  class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug">
                
                    @error('slug')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-12">
            <div class="form-check">
                
                <input class="form-check-input" type="checkbox"  name="status" style="width: 20px;height:20px;" >
                <label class="form-check-label" for="invalidCheck">
                   Unchecked->visable / Checked->hidden
                </label>
                
               
            </div>
            </div>
            <div class="col-12">
            <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form><!-- End category create form  -->

        </div>
    </div>
</div>
@endsection