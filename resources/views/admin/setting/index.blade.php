@extends('layouts.admin')
@section('title','Settings')
@section('content')
<div class="pagetitle">
    <h1>Settings</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('setting.admin.view')}}">Settings</a></li>

        </ol>
    </nav>
</div><!-- End Page Title -->


<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Settings Public
                <a href="{{route('setting.admin.edit')}}" class="btn btn-success btn-m text-white float-end inline"><i
                        class="ri ri-edit-2-line"></i>Edit Settings</a>
            </h5>
            <hr>
            <!-- Vertical Pills Tabs -->
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-website-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-website" type="button" role="tab" aria-controls="v-pills-website"
                        aria-selected="true">Information Website</button>
                    <button class="nav-link" id="v-pills-social-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-social" type="button" role="tab" aria-controls="v-pills-social"
                        aria-selected="false">Social Madia</button>
                    <button class="nav-link" id="v-pills-about-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-about" type="button" role="tab" aria-controls="v-pills-about"
                        aria-selected="false">About Section</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-website" role="tabpanel"
                        aria-labelledby="v-pills-website-tab">
                        <div class="row">

                            <div class="col-md-12 mt-2">
                                <h3 class="text-primary">Website Name</h3>
                                <p class="d-inline">{{$setting->website_name ?? 'Empty'}}</p>
                            </div>
                            <div class="col-md-12 mt-2">
                                <h3 class="text-primary">Email</h3>
                                <p class="d-inline">{{$setting->email ?? 'Empty'}}</p>
                            </div>
                            <div class="col-md-12 mt-2">
                                <h3 class="text-primary">Phone</h3>
                                <p class="d-inline">{{$setting->phone ?? 'Empty'}}</p>
                            </div>
                            <div class="col-md-12 mt-2">
                                <h3 class="text-primary">Time Work</h3>
                                <p class="d-inline">{{$setting->time_work ?? 'Empty'}}</p>
                            </div>
                            <div class="col-md-12 mt-2">
                                <h3 class="text-primary">Address</h3>
                                <p class="d-inline">{{$setting->address ?? 'Empty'}}</p>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="v-pills-social" role="tabpanel" aria-labelledby="v-pills-social-tab">
                        <div class="row">

                            <div class="col-md-12 mt-2">
                                <h3 class="text-primary">Facebook</h3>
                                <a href="{{$setting->facebook ?? '#'}}" target="__blank"><i class="bi bi-facebook"></i></a> <p class="d-inline">{{$setting->facebook ?? 'Empty'}}</p>
                            </div>
                            <div class="col-md-12 mt-2">
                                <h3 class="text-primary">Instagram</h3>
                                <a href="{{$setting->instagram ?? '#'}}" target="__blank"><i class="bi bi-instagram"></i></a><p class="d-inline">{{$setting->instagram ?? 'Empty'}}</p>
                            </div>
                            <div class="col-md-12 mt-2">
                                <h3 class="text-primary">Twitter</h3>
                                <a href="{{$setting->twitter ?? '#'}}" target="__blank"><i class="bi bi-twitter"></i></a> <p class="d-inline">{{$setting->twitter ?? 'Empty'}}</p>
                            </div>
                            <div class="col-md-12 mt-2">
                                <h3 class="text-primary">Linkedin</h3>
                                <a href="{{$setting->linkedin ?? '#'}}" target="__blank"><i class="bi bi-linkedin"></i></a> <p class="d-inline">{{$setting->linkedin ?? 'Empty'}}</p>
                            </div>
                        </div>
                    </div>    
                    <div class="tab-pane fade" id="v-pills-about" role="tabpanel"
                            aria-labelledby="v-pills-about-tab">
                            <div class="row">

                                <div class="col-md-12 mt-2">
                                    <h3 class="text-primary">Description</h3>
                                    <p class="d-inline">{{$setting->description ?? 'Empty'}}</p>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <h3 class="text-primary">Video</h3>
                                    <p class="d-inline" >{{$setting->video_url ?? 'Empty'}}</p>
                                    <br>
                                   <h3>if you want to watch vedio ,<a href="{{$setting->video_url ?? '#'}}"
                                        class="glightbox pulsating-play-btn" style="color:orange;">click here</a></h3>
                                </div>
                            </div>
                    </div>
                    
                </div>
                <!-- End Vertical Pills Tabs -->

            </div>
    </div>
  
</div>
<div class="row">
@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-1"></i>
     {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
 
@endif 
     <!-- Card with header and footer -->
        <div class="card">
         <h5 class="card-title">Gallery</h5>
          <div class="card-body">
            <form action="{{route('gellery.admin.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label  class="form-label">Image</label>
                    <input type="file" class="form-control" multiple name="image[]" required>
                    @error('image.*')
                     <small class="form-text text-danger">
                            {{ $message }}
                     </small>
                    @enderror
                    @error('image')
                     <small class="form-text text-danger">
                            {{ $message }}
                     </small>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
            <hr>
            <h2 class="text-primary text-center">Information Website</h2>
            <div id="alert-container"></div>
            @if ($galleries)
                <div class="row g-1">
                    @forelse ($galleries as $gallery)
                        <div class="col-lg-3 col-md-4" id="gallery-item-{{ $gallery->id }}">
                            <a href="{{asset('/storage/'.$gallery->image)}}" class="glightbox" data-gallery="images-gallery">
                                <img src="{{asset('/storage/'.$gallery->image)}}" alt="" class="img-fluid" style="height:300px;width:400px;">
                            </a>
                          <div class="d-flex justify-content-center mt-2">
                                <a href="" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#updateimageModal{{ $gallery->id }}">
                                    <i class="ri ri-edit-2-line"></i>  Edit
                                </a>
                                <a href="" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deleteimageModal{{ $gallery->id }}">
                                    <i class="ri ri-delete-bin-5-line"></i>  Delete 
                                </a>
                                <!--Delete Image Modal -->
                                <div class="modal fade" id="deleteimageModal{{ $gallery->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteimageModalLabel{{ $gallery->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="deleteimageModalLabel{{ $gallery->id }}">Delete Image</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <h4>Are you sure you want to delete this data?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" value="{{$gallery->id}}" class="deleteimagegarllery btn btn-danger"><i class="ri ri-delete-bin-5-line"></i> Yes,Delete</button>
                                        </div>
                                
                                
                                    </div>
                                    </div>
                                </div>
                                 <!--End Delete Image Modal-->
                                    <!--Update Image Modal -->
                                    <div class="modal fade" id="updateimageModal{{ $gallery->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Update Image</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                             <form id="updateImageForm{{$gallery->id}}">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="col-md-10">
                                                        <label  class="form-label">Image</label>
                                                        <input type="file" class="form-control" id="image" name="image">
                                                        
                                                            @error('image')
                                                            <small class="form-text text-danger">{{$message}}</small>
                                                            @enderror
                                                        
                                                    </div>
                                                    
                                                </div>
                                             </form>
                                                
                                            
                                         
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" value="{{ $gallery->id }}" id="updateimage" class="updateimagegarllery btn btn-success">  <i class="ri ri-edit-2-line"></i> Edit</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <!--End Update Image Modal-->
                          </div> 
                        </div>
                    @empty
                     <h2 class="text-primary text-center">Not Image Available</h2>
                    @endforelse
                   
                </div>
            @endif
            
          </div>
        
        </div><!-- End Card with header and footer -->

  
    
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
        $(document).on('click','.deleteimagegarllery', function(){
            var image_id = $(this).val();
            $.ajax({
                type:"DELETE",
                url:"/adminpanel/gallery/delete/image/"+image_id,
                success:function(response){
                    showAlert(response.message);
                    $('#deleteimageModal' + response.id).modal('hide');

                    // Optionally remove the deleted image from the DOM
                    $('#gallery-item-' + response.id).remove();
                    
                }


            });
        });
                
        $(document).on('click','.updateimagegarllery',function(e) {
            e.preventDefault(); // Prevent the default form submission
            var image_id = $(this).val();
        
            var formdata = new FormData($('#updateImageForm' + image_id)[0]);
            $.ajax({
                type:"POST",
                url:"/adminpanel/gallery/update/image/"+image_id,
                data:formdata,
                processData: false,
                contentType: false,
                success:function(response){
                    showAlert(response.message);
                    $('#updateimageModal' + response.id).modal('hide');
                        // Update the image in the gallery without reloading the page
                        var newImageUrl = '/storage/' + response.image;
                        $('#gallery-item-' + response.id).find('img').attr('src', newImageUrl);
                 
                    
                },
                error: function(xhr) {
                  alert(xhr.responseJSON.message);
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
