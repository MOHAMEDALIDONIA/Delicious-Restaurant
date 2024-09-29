@extends('layouts.admin')
@section('title','Food')
@section('content')
    <div class="pagetitle">
        <h1>Food Table</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('food.admin.view')}}">Food</a></li>
    
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class="col-md-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Food Table
                 <a href="{{route('food.admin.create')}}" class="btn btn-primary btn-m text-white float-end inline"><i class="bi bi-plus-circle"></i> Add food</a>
                </h5>
                <hr>
              <div class="table-responsive">
                <!-- food Table -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Image</th>
                      <th scope="col">Price</th>
                      <th scope="col">Category</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($food as $fooditem)
                    <tr>
                        <th scope="row">{{$fooditem->id}}</th>
                        <td>{{$fooditem->name}}</td>
                        @if ($fooditem->image != null)
                          <td>
                            <img src="{{asset('storage/'.$fooditem->image)}}" alt="" style="width:70px;height:50px;">
                          </td>
                        @else
                          <td>
                            Not Image Available
                          </td> 
                        @endif

                        <td>{{$fooditem->price}}</td>
                        @if ($fooditem->category)
                            <td>{{$fooditem->category->name}}</td>
                        @else
                            <td>__</td>    
                        @endif
                        <td>
                            <a href="{{route('food.admin.edit',$fooditem->id)}}" class="btn btn-success btn-sm text-white">
                                <i class="ri ri-edit-2-line"></i> Edit 
                            </a>
                            <a href="" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deletefooditem{{$fooditem->id}}">
                               <i class="ri ri-delete-bin-5-line"></i>  Delete 
                            </a>
                                <!-- Vertically centered Modal -->
            
                                <div class="modal fade" id="deletefooditem{{$fooditem->id}}" tabindex="-1">
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
                                        <a href="{{route('food.admin.delete',$fooditem->id)}}" class="btn btn-danger  text-white" >
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
                         <td colspan="6"> No fooditem Available</td>
                       </tr> 
                    @endforelse
                  
                  </tbody>
                </table>
                <!-- End food Table -->
              </div>  
             </div>
            </div>
  
         
  
  
  
          </div>
    </div>
@endsection
    
