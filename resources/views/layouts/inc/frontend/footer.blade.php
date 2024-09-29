<footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
              
            <p>{{$appsetting->address ?? 'Address not Available'}}</p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>{{$appsetting->phone ?? 'Phone not Available'}}</span><br>
              <strong>Email:</strong> <span>{{$appsetting->email ?? 'Email not Available'}}</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>{{$appsetting->time_work ?? 'All Time'}}</strong>
            </p>
          </div>
        </div>
       
        <div class="col-lg-3 col-md-6 ">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            @if ($appsetting->twitter != null)
            <a href="{{$appsetting->twitter}}" class="twitter" target="__blank"><i class="bi bi-twitter-x"></i></a>
           @endif
           @if ($appsetting->facebook != null)
            <a href="{{$appsetting->facebook}}" class="facebook" target="__blank"><i class="bi bi-facebook"></i></a>
           @endif
           @if ($appsetting->instagram != null)
            <a href="{{$appsetting->instagram}}" class="instagram" target="__blank"><i class="bi bi-instagram"></i></a>
           @endif
           @if ($appsetting->linkedin != null)
            <a href="{{$appsetting->linkedin}}" class="linkedin" target="__blank"><i class="bi bi-linkedin"></i></a>
           @endif
              
          </div>
        </div>

      </div>
    </div>


  </footer>