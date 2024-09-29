@extends('layouts.admin')
@section('title','Add Table')
@section('content')
<div class="pagetitle">
    <h1>Tables</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('table.admin.view')}}">Tables</a></li>
        <li class="breadcrumb-item"><a href="{{route('table.admin.create')}}">Add Table</a></li>

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
{{-- start Table create form --}}
<div class="col-lg-12"> 
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Add Table</h5>
        

        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" action="{{route('table.admin.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label  class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
                
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
         
            <div class="col-12">
               <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form><!-- End Table create form  -->

        </div>
    </div>
</div>
@endsection