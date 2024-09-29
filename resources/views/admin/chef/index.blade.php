@extends('layouts.admin')
@section('title','Chef')
@section('content')
    <div class="pagetitle">
        <h1>Chef Table</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('chef.admin.view')}}">Chef</a></li>
    
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class="col-md-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Chef Table
                 <a href="{{route('chef.admin.create')}}" class="btn btn-primary btn-m text-white float-end inline"><i class="bi bi-plus-circle"></i> Add chef</a>
                </h5>
                <hr>
              <div class="table-responsive">
                <!-- chef Table -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Title</th>
                      <th scope="col">Image</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($chefs as $chef)
                    <tr>
                        <th scope="row">{{$chef->id}}</th>
                        <td>{{$chef->name}}</td>
                        <td>{{$chef->title}}</td>
                        @if ($chef->image != null)
                          <td>
                            <img src="{{asset('storage/'.$chef->image)}}" alt="" style="width:70px;height:50px;">
                          </td>
                        @else
                          <td>
                            <img src="{{asset('storage/user/uploads/avaters/userprofile.jpg')}}" alt="" style="width:70px;height:50px;">
                          </td> 
                        @endif

                     
                        <td>
                            <a href="{{route('chef.admin.edit',$chef->id)}}" class="btn btn-success btn-sm text-white">
                                <i class="ri ri-edit-2-line"></i> Edit 
                            </a>
                            <a href="" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deletechef{{$chef->id}}">
                               <i class="ri ri-delete-bin-5-line"></i>  Delete 
                            </a>
                                <!-- Vertically centered Modal -->
            
                                <div class="modal fade" id="deletechef{{$chef->id}}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title">Delete Item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                             Are You Sure Delete This Item?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="{{route('chef.admin.delete',$chef->id)}}" class="btn btn-danger  text-white" >
                                            <i class="ri ri-delete-bin-5-line"></i>  Delete 
                                         </a>
                                        </div>
                                    </div>
                                    </div>
                                </div><!-- End Vertically centered Modal-->
                        </td>
                      </tr> 
                    @empty
                       <tr>
                         <td colspan="9"> No Chef Available</td>
                       </tr> 
                    @endforelse
                  
                  </tbody>
                </table>
                <!-- End chef Table -->
              </div>  
             </div>
            </div>
  
         
  
  
  
          </div>
    </div>
@endsection
    
