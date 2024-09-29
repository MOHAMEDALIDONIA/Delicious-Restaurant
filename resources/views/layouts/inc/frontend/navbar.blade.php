<header id="header" class="header fixed-top">

  <div class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-end justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center d-none d-lg-block"><span>{{$appsetting->phone ?? 'Phone not Available'}}</span></i>
        <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>{{$appsetting->time_work ?? 'All Time'}}</span></i>
      </div>
      <a href="{{url('/#book-a-table')}}" class="cta-btn">Booka a table</a>
    </div>
  </div><!-- End Top Bar -->

  <div class="branding d-flex align-items-cente">

    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Delicious</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{url('/#hero')}}" class="active">Home</a></li>
          <li><a href="{{url('/#about')}}">About</a></li>
          <li><a href="{{url('/#menu')}}">Menu</a></li>
   
          <li><a href="{{url('/#events')}}">Events</a></li>
          <li><a href="{{url('/#chefs')}}">Chefs</a></li>
          <li><a href="{{url('/#gallery')}}">Gallery</a></li>
          @guest('web')
            @if (Route::has('login'))
              <li><a href="{{route('login')}}">Login</a></li>
            @endif
            @if (Route::has('register.user'))
             <li><a href="{{route('register.user')}}">Register</a></li> 
            @endif
          @else
            <li class="dropdown"><a href="#"><span>{{auth()->user()->name}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="{{route('cart.view')}}">Cart <i class="bi bi-cart-fill"></i></a></li>
                <li><a href="{{route('profile.view')}}">Profile <i class="bi bi-person-circle"></i></a></li>
                <li><a href="{{route('user.orders.view')}}">My Orders</a></li>
                <li><a href="{{route('user.reservations.view')}}">My Reservations</a></li>
                <li>       <a  href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                      log out
                  </a>
              </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </ul>
            </li>
         @endguest
   
          <li><a href="{{url('/#contact')}}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>

  </div>

</header>