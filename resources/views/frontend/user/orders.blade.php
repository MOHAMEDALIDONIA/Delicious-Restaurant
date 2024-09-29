@extends('layouts.app')
@section('title','My orders')
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
                                    <h4 class="font-weight-bold mt-0 mb-4">Past Orders</h4>
                                    @forelse ($orders as $order)
                                        <div class="bg-white card mb-4 order-list shadow-sm">
                                            <div class="gold-members p-4">
                                              
                                                <div class="media">
                                               
                                                    <div class="media-body">
                                                        
                                                        <span class="float-right text-info mb-3" >Order Number ({{$order->id}})<i class="icofont-check-circled text-success"></i></span>
                                                        <hr>
                                                    
                                                        <p class="text-primary mb-2"> Full Name :: <p class="text-gray">{{$order->fullname}}</p></p>
                                        
                                                        <p class="text-primary mb-2"> Address :: <p class="text-gray">{{$order->address}}</p></p>
                                                        <p class="text-primary mb-2"> Status :: <p class="text-gray">{{$order->status}}</p></p>
                                                        @if ($order->instructions != null)
                                                          <p class="text-primary mb-2"> Instructions :: <p class="text-gray">{{$order->instructions}}</p></p>  
                                                        @endif
              
                                                      <p class="text-primary mb-2"> Time Order ::</p>{{$order->created_at}}
                                                     
                                                        <hr>
                                                        <div class="float-right d-flex justify-content-center ">
                                                            <a class="btn btn-lg btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#OrderItem{{$order->id}}">View Order Items</a>
                                                                    <!-- Vertically centered Modal -->
                                                     
                                                            <div class="modal fade" id="OrderItem{{$order->id}}" tabindex="-1">
                                                                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    
                                                                        
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Order Items</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-bordered text-white">
                                                                                  <thead >
                                                                                    <tr>
                                                                                      <th>Item Id</th>
                                                                                      <th>Image</th>
                                                                                      <th>Classify food</th>
                                                                                      <th>Price</th>
                                                                                      <th>Quantity</th>
                                                                                      <th> Total </th>
                                                                                    </tr>
                                                                                  </thead>
                                                                                  <tbody>
                                                                                    @php
                                                                                    $totalprice = 0 ;
                                                                                   @endphp
                                                                                   @forelse ($order->orderitem as $item)
                                                                                 
                                                                                   <tr>
                                                                                      <td>{{$item->id}}</td>
                                                                                      
                                                                                
                                                                                      
                                                                                      <td>
                                                                                       @if($item->food->image) 
                                                                                        <img src="{{asset('storage/'.$item->food->image)}}" style="width: 50px; height: 50px" alt="">
                                                                                       @else
                                                                                        <img src="" style="width: 50px; height: 50px" alt="">
                                                                                      @endif
                                                                                    </td>
                                                                                     <td>{{$item->food->name}}</td>
                                                                                      <td>{{$item->price}}</td>
                                                                                      <td>{{$item->quantity}}</td>
                                                                                      <td>
                                                                                         {{$item->quantity * $item->price}}
                                                                                      </td>
                                                                                  </tr>
                                                                                    @php
                                                                                    $totalprice += $item->quantity * $item->price
                                                                                    @endphp
                                                                                       
                                                                                   @empty
                                                                                
                                                                                      
                                                                                   @endforelse
                                                        
                                                                                    <tr>
                                                                                      <td colspan="5" class="fw-bold">Total Price:</td>
                                                                                      <td colspan="1" class="fw-bold">${{$totalprice}}</td>
                                                                                    </tr>
                                                                                
                                                                              
                                                                                  </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <a href="{{route('user.reorder',$order->id)}}" class="btn btn-primary">Re-order</a>
                                                                        </div>
                                                                    
                                                          
                                                                </div>
                                                                </div>
                                                            </div><!-- End Vertically centered Modal-->
                                                        </div>
                                                     
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
                                                            <a href="#" class="text-black text-center">No Order</a>
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