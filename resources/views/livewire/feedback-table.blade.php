<div>
    <div class="pagetitle">
        <h1>Feedback Table</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('feedback.admin.view')}}">Feedback</a></li>
    
        </ol>
        </nav>
    </div><!-- End Page Title -->
  @if (session()->has('message'))
    <div class="alert alert-success">
       {{ session('message') }}
    </div>
   @endif
    <div class="row">
        <div class="col-md-12">
    
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Feedback Table
                
                </h5>
                <hr>
              <div class="table-responsive">
                <!-- Feedback Table -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">User Name</th>
                      <th scope="col">User opinion</th>
                      <th scope="col">Rate</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($Feedbacks as $Feedback)
                    <tr>
                        <th scope="row">{{$Feedback->id}}</th>
                        <td>{{$Feedback->user->name}}</td>
                  
    
                        <td>{{$Feedback->message}}</td>
                        <td>{{$Feedback->rate}}</td>
                         <td>{{$Feedback->status == 0 ? 'Visable':'Hidden'}}</td>
                        <td>
                            <a wire:click="editstatus({{$Feedback->id}})" class="btn btn-success btn-sm text-white">
                                <i class="ri ri-edit-2-line"></i> Edit 
                            </a>
                            <a href="" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deleteFeedback{{$Feedback->id}}">
                               <i class="ri ri-delete-bin-5-line"></i>  Delete 
                            </a>
                                <!-- Vertically centered Modal -->
            
                                <div class="modal fade" id="deleteFeedback{{$Feedback->id}}" tabindex="-1">
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
                                        <a wire:click="deletefeedback({{$Feedback->id}})" class="btn btn-danger  text-white" >
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
                         <td colspan="6"> No Feedback Available</td>
                       </tr> 
                    @endforelse
                  
                  </tbody>
                </table>
                <!-- End Feedback Table -->
              </div>  
             </div>
            </div>
    
         
    
    
    
          </div>
    </div>
</div>

