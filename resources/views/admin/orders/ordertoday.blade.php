@extends('layouts.admin')
@section('title','Orders')
@section('content')
    <div class="pagetitle">
        <h1>Orders Table</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('order.admin.view')}}">Orders</a></li>
            <li class="breadcrumb-item"><a href="{{route('order.today')}}">Orders Today</a></li>
    
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
      <div id="alert-container"></div>
        <div class="col-md-12">
          <!-- Default Card -->
          @forelse ($orders as $order)
            <div class="card" id="order-card-{{$order->id}}">
                <div class="card-body">
                <h5 class="card-title">Order Number {{$order->id}}</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="color: red;">Order Details </h5>
                            <hr> 
                            <h6>Order Id:->({{$order->id}})</h6>
                            <h6>Tracking Id/No:->({{$order->tracking_no}})</h6>
                            <h6>Order Date:->({{$order->created_at->format('d-m-Y h:i A')}})</h6>
                            @if($order->instructions != null)
                            <h6>Delivary Instructions:->({{$order->instructions}})</h6>
                            @endif
                            <h6 class="border p-2 text-success">
                                Order Status Message: <span class="text-uppercase">({{$order->status}})</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5 style="color: red;">User Details </h5>
                            <hr> 
                            <h6>Full Name:->({{$order->fullname}})</h6>
                            <h6>Email Id:->({{$order->user->email}})</h6>
                            <h6>Phone:->({{$order->phone}})</h6>
                            <h6>Address:->({{$order->address}})</h6>
                        
                        </div>
                    </div>
                    <br>
                    <h5>Order Items({{$order->orderitem->sum('quantity')}})</h5>
                    <hr>
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
                    <div class="d-flex justify-content-center">
                        <a href="#" data-id="{{$order->id}}" data-status="Out-For-Delivery"  class="update-status btn btn-lg btn-success" >Out For Delivery</a>
                        <a href="#" data-id="{{$order->id}}" data-status="Cancelled"  class="update-status btn btn-lg btn-warning" >Cancelled</a>
                    </div>
                 
                </div>
            </div><!-- End Default Card --> 
          @empty
              
          @endforelse
         
        </div>
    </div>
@endsection   
@section('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    $(document).ready(function(){
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','.update-status', function(e){
        
          e.preventDefault(); // Prevent the default behavior of the anchor tag

     
           var order_id = $(this).data('id'); // Get the ID from the data attribute
           var status = $(this).data('status');
          
            $.ajax({
                type:"POST",
                url:"/adminpanel/order/update/status/"+order_id,
                data: {
                    status: status,
                    _token: $('meta[name="csrf-token"]').attr('content') // CSRF token added to the data
                },
                success:function(response){
                  showAlert(response.message);
                    // Remove the order card from the DOM
                    $('#order-card-' + order_id).remove();
                    
                }


            });
        });
                
  
        function showAlert(message) {
         // Create alert element
         var alertDiv = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
         // Append alert to a specific element in the Blade view
         $('#alert-container').html(alertDiv);
       }
 });
</script>
@endsection 