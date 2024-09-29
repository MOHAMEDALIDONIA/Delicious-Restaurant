@extends('layouts.admin')
@section('title','Edit Food')
@section('content')
<div class="pagetitle">
    <h1>Food Table</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('food.admin.view')}}">Food</a></li>
        <li class="breadcrumb-item"><a href="{{route('food.admin.edit',$food->id)}}">Edit Food</a></li>

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
{{-- start Food create form --}}
<div class="col-lg-12"> 
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Edit Food</h5>
        

        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" action="{{route('food.admin.update',$food->id)}}"  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label  class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{$food->name}}" required>
                
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Price</label>
                <input type="text" class="form-control" name="price" value="{{$food->price}}" required>
                
                    @error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
                @if ($food->image != null)
                 <img src="{{asset('storage/'.$food->image)}}" alt="" style="width:150px;height:90px;">
                @endif
                    @error('image')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Category</label>
                 @if ($categories)
                    <select name="category_id" id=""  class="form-control">
                        <option value="{{$food->category->id}}">{{$food->category->name}}</option>
                        @forelse ($categories as $category)
                         <option value="{{$category->id}}">{{$category->name}}</option>
                        @empty
                           <td>Not Category Available</td>   
                        @endforelse
                    </select>
                 @endif
                
                    @error('category_id')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-12">
                <label  class="form-label">Ingredients</label>
                 <textarea  class="form-control" name="ingredients" required>{{$food->ingredients}}</textarea>
                 @error('ingredients')
                  <small class="form-text text-danger">{{$message}}</small>
                 @enderror
             </div>
            <div class="col-12">
            <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form><!-- End Food create form  -->

        </div>
    </div>
</div>
@endsection