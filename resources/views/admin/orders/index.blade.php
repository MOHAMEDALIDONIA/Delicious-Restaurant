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
        @if (session('message'))
        <h3 class="alert alert-success">{{session('message')}}</h3>
        @endif
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                  <h3>My Orders (Count:{{$orders->count()}})
                
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
                            <div class="col-md-3">
                                <label >Filter by Status</label>
                                <select name="status"  class="form-select">
                                    <option value="">Select All Status</option>
                                    <option value="in progress"{{Request::get('status')== 'in progress'? 'selected':''}}>In Progress</option>
                                    <option value="completed"{{Request::get('status')== 'completed'? 'selected':''}}>Completed</option>
                                    <option value="cancelled"{{Request::get('status')== 'cancelled'? 'selected':''}}>Cancelled</option>
                                    <option value="out-for-delivery"{{Request::get('status')== 'out-for-delivery'? 'selected':''}}>Out for delivery</option>
                                  </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                      </form>
                      <hr>
                      <div class="table-responsive">
                        <table class="table table-bordered text-white" id="orderTable">
                          <thead >
                            <tr>
                                <th>Order ID</th>
                                <th>User Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Tracking No</th>
                                <th>Instructions</th>
                                <th>Time Order</th>
                                <th>Status Massage</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                         @forelse ($orders as $order)
                           <tr>
                              <td>{{$order ->id}}</td>
                              <td>{{$order->fullname}}</td>
                              <td>{{$order->address}}</td>
                              <td>{{$order->phone}}</td>
                              <td>{{$order ->tracking_no}}</td>
                              <td>{{$order->instructions}}</td>
                              <td>{{$order->created_at->format('Y-m-d')}}</td>
                              <td>{{$order->status}}</td>
                       
                              <td>
                                <a href="" class="btn btn-primary btn-sm">View</a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  <label  class="btn btn-danger btn-sm">Delete</label> 
                              </a>
                              <!-- Modal -->
                               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete Order</h5>
                                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    
                                      <div class="modal-body">
                                        <h4>Are you sure you want to delete this data?</h4>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <a href=""><button type="button" class="btn btn-primary">Yes,Delete</button></a>
                                      </div>
                              
                              
                                  </div>
                                </div>
                               </div>
                              </td>
                          </tr>
                               
                           @empty
                            <tr>
                              <td colspan="9"> No order Available</td>
                            </tr>
                              
                        @endforelse
                          
                 
                          </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{$orders->appends(request()->query())->links() }}
                        </div> 
                      </div>
      
                </div>
                
            </div>
        </div>  
      </div>
@endsection    
