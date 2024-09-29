@extends('layouts.app')
@section('title','My Reservations')
@section('content')
<div class="container bootstrap snippets bootdeys" style="margin-top: 100px;">
    <div class="row d-flex justify-content-center">
        <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">

            <div class="container">
                <div class="row">
               
                    <div class="col-md-12">
                        <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <h4 class="font-weight-bold mt-0 mb-4">Past Reservations</h4>
                                    @forelse ($reservations as $reservation)
                                        <div class="bg-white card mb-4 order-list shadow-sm">
                                            <div class="gold-members p-4">
                                              
                                                <div class="media">
                                               
                                                    <div class="media-body">
                                                        
                                                        <span class="float-right text-info mb-3" >Reservation Number ({{$reservation->id}})<i class="icofont-check-circled text-success"></i></span>
                                                        <hr>
                                                    
                                                        <p class="text-primary mb-2"> Full Name :: <p class="text-gray">{{$reservation->user->name}}</p></p>
                                                        <p class="text-primary mb-2"> Table Number :: <p class="text-gray">{{$reservation->tables->name}}</p></p>
                                                        <p class="text-primary mb-2"> Number Of People :: <p class="text-gray">{{$reservation->number_people}}</p></p>
                                                        @if ($reservation->message)
                                                        <p class="text-primary mb-2"> Message :: <p class="text-gray">{{$reservation->message}}</p></p>  
                                                        @endif
                  
                                                        <p class="text-primary mb-2"> Time reservation :: <p class="text-gray"> Day :{{$reservation->day_booking}} | Time: {{$reservation->time_booking}}</p></p>
                                    
                                                     
                                                   
                                                     
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <div class="bg-white card mb-4 order-list shadow-sm">
                                            <div class="gold-members p-4">
                                                <a href="#">
                                                </a>
                                                <div class="media">
                                                 
                                                    <div class="media-body">
                                                      
                                                        <h2 class="mb-2">
                                                            <a href="#"></a>
                                                            <a href="#" class="text-black text-center">No Reservation</a>
                                                        </h2>
                                                   

                        
                                                
                                                        <hr>
                                                  
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforelse

                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection