@extends('layouts.admin')
@section('title','Reservations Table')
@section('content')
<div class="pagetitle">
    <h1>Reservations Table</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('booking.admin.view')}}">Reservations</a></li>

    </ol>
    </nav>
</div><!-- End Page Title -->
<div class="row">
  @if (session('message'))
  <h3 class="alert alert-success">{{session('message')}}</h3>
  @endif
  <div class="col-md-12 ">
      <div class="card">
          <div class="card-header">
            <h3>My Reservations (Count:{{$Reservations->count()}})
 
            </h3>
           <hr>
          </div>
          <div class="card-body">
                <form action="" method="GET" >
                  <div class="row">
                      <div class="col-md-3">
                          <label >Filter by Date</label>
                          <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}"  class="form-control">
                          @error('date')
                          <small class="form-text text-danger">{{$message}}</small> 
                          @enderror
                      </div>
                     
                      <div class="col-md-6">
                          <br>
                          <button type="submit" class="btn btn-primary">Filter</button>
                      </div>
                  </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <!-- food Table -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">User</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Number Table</th>
                          <th scope="col">Number of People</th>
                          <th scope="col">Message</th>
                          <th scope="col">Day of Booking</th>
                          <th scope="col">Time of Booking</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($Reservations as $Reservation)
                        <tr>
                            <th scope="row">{{$Reservation->id}}</th>
                            <td>{{$Reservation->user->name}}</td>
                            <td>0{{$Reservation->phone}}</td>
    
                            <td>{{$Reservation->tables->name}}</td>
                            <td>{{$Reservation->number_people}}</td>
                            @if ($Reservation->message)
                                <td>{{$Reservation->message}}</td>
                            @else
                                <td>__</td>    
                            @endif
                            <td>{{$Reservation->day_booking}}</td>
                            <td>{{$Reservation->time_booking}}</td>
                            <td>
                                <a href="{{route('booking.admin.edit',$Reservation->id)}}" class="btn btn-success btn-sm text-white">
                                    <i class="ri ri-edit-2-line"></i> Edit 
                                </a>
                                <a href="" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deleteReservation{{$Reservation->id}}">
                                   <i class="ri ri-delete-bin-5-line"></i>  Delete 
                                </a>
                                    <!-- Vertically centered Modal -->
                
                                    <div class="modal fade" id="deleteReservation{{$Reservation->id}}" tabindex="-1">
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
                                            <a href="{{route('booking.admin.delete',$Reservation->id)}}" class="btn btn-danger  text-white" >
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
                             <td colspan="9"> No Reservation Available</td>
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