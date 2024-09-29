@extends('layouts.admin')
@section('title','Edit Reservation')
@section('content')
<div class="pagetitle">
    <h1>Reservation Table</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('booking.admin.view')}}">Reservation</a></li>
        <li class="breadcrumb-item"><a href="{{route('booking.admin.edit',$Reservation->id)}}">Edit Reservation</a></li>

    </ol>
    </nav>
</div><!-- End Page Title -->
@php
   use Carbon\Carbon;              
 $periods =\Carbon\CarbonPeriod::create('08:00','60 minutes','23:00');

@endphp
@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-1"></i>
     {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
 
@endif 
{{-- start Reservation create form --}}
<div class="col-lg-12"> 
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Edit Reservation</h5>
        

        <!-- Custom Styled Validation -->
        <form class="row g-3 needs-validation" action="{{route('booking.admin.update',$Reservation->id)}}"  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label  class="form-label">User Name</label>
                <input type="text" class="form-control" readonly  value="{{$Reservation->user->name}}" required>
                
               
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">User Phone</label>
                <input type="text" class="form-control" name="phone" value="0{{$Reservation->phone}}" required>
                
                    @error('phone')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label" >Number Table</label>
                <select name="number_table" class="form-control" id="">
                    <option value="{{$Reservation->number_table}}" selected>{{$Reservation->number_table}}</option>
                     @for ($i = 1; $i < 11; $i++)
                     <option value="{{$i}}">{{$i}}</option>
                     @endfor
                
                 
                </select>
                @error('number_table')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label  class="form-label">Number Of People</label>
                <input type="number" class="form-control" name="number_people" value="{{$Reservation->number_people}}" required>
                
                    @error('number_people')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Day Booking</label>
                <input type="date" class="form-control" name="day_booking" value="{{$Reservation->day_booking}}" required>
                
                    @error('day_booking')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                
            </div>
            <div class="col-md-6">
                <label  class="form-label">Time Booking</label>
                <select name="time_booking"  class="form-control" id="">
                    <option value="{{ Carbon::parse($Reservation->time_booking)->format('H:i') }}" selected>{{ Carbon::parse($Reservation->time_booking)->format('H:i') }}</option>
                    @foreach ($periods as $period)
                    <option value="{{ $period->format('H:i')}}">{{$period->format('H:i')}}</option>
                   @endforeach
                
                 
                </select>
                @error('number_table')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-12">
                <label  class="form-label">Message</label>
                 <textarea  class="form-control" name="message" required>{{$Reservation->message}}</textarea>
                 @error('message')
                  <small class="form-text text-danger">{{$message}}</small>
                 @enderror
             </div>
            <div class="col-12">
            <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form><!-- End Reservation create form  -->

        </div>
    </div>
</div>
@endsection