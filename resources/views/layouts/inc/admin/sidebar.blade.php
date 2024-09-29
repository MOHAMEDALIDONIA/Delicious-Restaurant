  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

 


       {{--start slider nav--}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#sliders-nav" data-bs-toggle="collapse" href="#">
          
         <i class="bx bx-slider"></i><span>Sliders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="sliders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('slider.admin.view')}}">
              <i class="bi bi-circle"></i><span>View Slider</span>
            </a>
          </li>
          <li>
            <a href="{{route('slider.admin.create')}}">
              <i class="bi bi-circle"></i><span>Add Slider</span>
            </a>
          </li>
        </ul>
      </li><!-- End slider Nav -->
      <li class="nav-item"><!--Start Category Nav -->
        <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-category"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('category.admin.view')}}">
              <i class="bi bi-circle"></i><span>View Category</span>
            </a>
          </li>
          <li>
            <a href="{{route('category.admin.create')}}">
              <i class="bi bi-circle"></i><span>Add Category</span>
            </a>
          </li>
        
         
        </ul>
      </li><!-- End Category Nav -->

      <li class="nav-item"><!--Start chef Nav -->
        <a class="nav-link collapsed" data-bs-target="#chef-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-person"></i><span>Chef</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="chef-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('chef.admin.view')}}">
              <i class="bi bi-circle"></i><span>View Chef</span>
            </a>
          </li>
          <li>
            <a href="{{route('chef.admin.create')}}">
              <i class="bi bi-circle"></i><span>Add Chef</span>
            </a>
          </li>
        
         
        </ul>
      </li><!-- End chef Nav -->
      <li class="nav-item"><!--Start Food Nav -->
        <a class="nav-link collapsed" data-bs-target="#Food-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-food-menu"></i><span>Food</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Food-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('food.admin.view')}}">
              <i class="bi bi-circle"></i><span>View Food</span>
            </a>
          </li>
          <li>
            <a href="{{route('food.admin.create')}}">
              <i class="bi bi-circle"></i><span>Add Food</span>
            </a>
          </li>
        
         
        </ul>
      </li><!-- End Food Nav -->
      <li class="nav-item"><!--Start Table Nav -->
        <a class="nav-link collapsed" data-bs-target="#Table-nav" data-bs-toggle="collapse" href="#">
          <i class="ri ri-table-alt-line"></i><span>Table</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Table-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('table.admin.view')}}">
              <i class="bi bi-circle"></i><span>View Table</span>
            </a>
          </li>
          <li>
            <a href="{{route('table.admin.create')}}">
              <i class="bi bi-circle"></i><span>Add Table</span>
            </a>
          </li>
        
         
        </ul>
      </li><!-- End Table Nav -->
      <li class="nav-item"><!--Start Event Nav -->
        <a class="nav-link collapsed" data-bs-target="#Event-nav" data-bs-toggle="collapse" href="#">
          <i class="ri ri-calendar-event-line"></i><span>Event</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Event-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('event.admin.view')}}">
              <i class="bi bi-circle"></i><span>View Event</span>
            </a>
          </li>
          <li>
            <a href="{{route('event.admin.create')}}">
              <i class="bi bi-circle"></i><span>Add Event</span>
            </a>
          </li>
        
         
        </ul>
      </li><!-- End Event Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="ri ri-order-play-line"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('order.admin.view')}}">
              <i class="bi bi-circle"></i><span>Orders</span>
            </a>
          </li>
          <li>
            <a href="{{route('order.today')}}">
              <i class="bi bi-circle"></i><span>Orders Today</span>
            </a>
          </li>
        
        </ul>
      </li><!-- End Orders Nav -->



      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('setting.admin.view')}}">
          <i class="ri ri-settings-5-line"></i>
          <span>Settings</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('booking.admin.view')}}">
          <i class="ri ri-restaurant-fill"></i>
          <span>Reservations</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('feedback.admin.view')}}">
          <i class="bi bi-envelope"></i>
          <span>Feedbacks</span>
        </a>
      </li><!-- End Contact Page Nav -->



  



    </ul>

  </aside><!-- End Sidebar-->