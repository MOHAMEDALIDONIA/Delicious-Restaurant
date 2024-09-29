@extends('layouts.app')
@section('title','Checkout')
@section('content')
<div>
    <div class="container bootstrap snippets bootdeys" style="margin-top: 100px;margin-bottom:100px;">
        <div class="row d-flex justify-content-center">
          <div class="col-xs-12 col-sm-9">
            <form class="form-horizontal" action="{{route('checkout.store')}}" method="POST" >
                @csrf
              <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="d-flex justify-content-center mt-2">
                        <h4 style="color: #ffb03b;">Checkout</h4>
                       
                      </div>
                      @if (session('message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                         {{session('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                </div>
            
                <div class="panel-body">
                  <div class="form-group">
                    
                    <div class="col-md-12">
                        <label class="control-label">Full Name</label>
                      <input type="text" name="fullname"  id="" class="form-control" required>
                    </div>
                    @error('fullname') <small class="text-danger">{{$message}}</small> @enderror
                  </div>
              
                  <div class="form-group">
                  
                    <div class="col-md-12">
                      <label class=" control-label">Phone</label>
                      <input type="text" name="phone"  class="form-control" required>
                    </div>
                    @error('phone') <small class="text-danger">{{$message}}</small>   @enderror
                  </div>
                  <div id="map" style="height: 500px; width:100%;" >
                    
                  </div>
                  <div class="form-group">
                    <label class="control-label">Address</label>
                    <div class="col-sm-12">
                      <input type="text" name="address"  id="address" class="form-control" required>
                    </div>
                    @error('address') <small class="text-danger">{{$message}}</small> @enderror
                  </div>
                  <div class="form-group">
                    <label class=" control-label">Instructions</label>
                    <div class="col-sm-12">
                      <textarea rows="4" name="instructions"  class="form-control" placeholder="Enter Address And Instructions"></textarea>
                    </div>
                    @error('instructions') <small class="text-danger">{{$message}}</small>   @enderror
                  </div>
                  <div class="form-group d-flex justify-content-center mt-3" style="margin-bottom:10px;">
    
                        <button type="submit" style="color: #ffffff; background: #ffb03b; border: 0;padding: 14px 60px;transition: 0.4s;border-radius: 4px;">Checkout</button>
                      
                    
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        </div>    
    </div>
    
@endsection  
@section('scripts')
<script>
    var map = L.map('map').setView([30.033333, 31.233334], 14); // Set initial location and zoom

    // Load tiles from OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
    }).addTo(map);

    var marker;

    // Reverse Geocoding Function
    function reverseGeocode(lat, lng) {
        fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('address').value = data.display_name;
            })
            .catch(error => console.error('Error:', error));
    }

    // Add click event listener to map
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        // Add or move marker to clicked location
        if (marker) {
            marker.setLatLng([lat, lng]);
        } else {
            marker = L.marker([lat, lng]).addTo(map);
        }

        // Call the reverse geocoding function
        reverseGeocode(lat, lng);
    });
</script>
@endsection