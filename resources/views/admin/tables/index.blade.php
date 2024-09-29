@extends('layouts.admin')
@section('title','Tables')
@section('content')
    <div class="pagetitle">
        <h1>Tables</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('table.admin.view')}}">Tables</a></li>
    
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> Tables
                 <a href="{{route('table.admin.create')}}" class="btn btn-primary btn-m text-white float-end inline"><i class="bi bi-plus-circle"></i> Add table</a>
                </h5>
                <hr>
                <!-- table Table -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($tables as $table)
                    <tr>
                        <th scope="row">{{$table->id}}</th>
                        <td>{{$table->name}}</td>
                        <td>
                            <a href="{{route('table.admin.edit',$table->id)}}" class="btn btn-success btn-sm text-white">
                                <i class="ri ri-edit-2-line"></i> Edit 
                            </a>
                            <a href="" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deletetable{{$table->id}}">
                               <i class="ri ri-delete-bin-5-line"></i>  Delete 
                            </a>
                                <!-- Vertically centered Modal -->
            
                                <div class="modal fade" id="deletetable{{$table->id}}" tabindex="-1">
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
                                        <a href="{{route('table.admin.delete',$table->id)}}" class="btn btn-danger  text-white" >
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
                         <td colspan="4"> No table Available</td>
                       </tr> 
                    @endforelse
                  
                  </tbody>
                </table>
                <!-- End table Table -->
              </div>
            </div>
  
         
  
  
  
          </div>
    </div>
@endsection
    
