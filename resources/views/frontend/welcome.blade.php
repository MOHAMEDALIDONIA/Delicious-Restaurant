@extends('layouts.app')
@section('title','Delicious Restaurant')
@section('content')
   
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
             @foreach ($sliders as $slider)
             <div class="carousel-item {{$loop->index == 0 ? 'active':''}}">
                @if ($slider->image)
                   <img src="{{asset('storage/'.$slider->image)}}" alt=""> 
                @endif
               
                <div class="carousel-container">
                  <h2><span>{{$slider->title}}</span></h2>
                  <p>{{$slider->description}}</p>
                  <div>
                    <a href="#menu" class="btn-get-started">Our Menu</a>
                    <a href="#book-a-table" class="btn-get-started">Book a table</a>
                  </div>
                </div>
              </div><!-- End Carousel Item -->
             @endforeach
           
      
         
      
              <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
              </a>
      
              <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
              </a>
      
              <ol class="carousel-indicators"></ol>
      
            </div>
      
        </section><!-- /Hero Section -->
      
          <!-- About Section -->
          <section id="about" class="about section light-background">
      
            <div class="container">
      
              <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                  <img src="{{asset('/frontend/assets/img/about.jpg')}}" class="img-fluid" alt="">
                  <a href="{{$appsetting->video_url ?? '#'}}" class="glightbox pulsating-play-btn"></a>
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                  <h3>We Are{{$appsetting->website_name ?? 'Restaurant'}},Let's get to know each other</h3>
                  <p class="fst-italic">
                    {{$appsetting->description ?? 'We have the best cooks, fast food and duties'}}
                  </p>
                </div>
              </div>
      
            </div>
      
          </section><!-- /About Section -->
      
          <!-- Why Us Section -->
          <section id="why-us" class="why-us section">
      
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Why Us</h2>
              <div><span>Why choose</span> <span class="description-title">Our Restaurant</span></div>
            </div><!-- End Section Title -->
      
            <div class="container">
      
              <div class="row gy-4">
      
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="card-item">
                    <span>01</span>
                    <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                    <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
                  </div>
                </div><!-- Card Item -->
      
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                  <div class="card-item">
                    <span>02</span>
                    <h4><a href="" class="stretched-link">Repellat Nihil</a></h4>
                    <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
                  </div>
                </div><!-- Card Item -->
      
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="card-item">
                    <span>03</span>
                    <h4><a href="" class="stretched-link">Ad ad velit qui</a></h4>
                    <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
                  </div>
                </div><!-- Card Item -->
      
              </div>
      
            </div>
      
          </section><!-- /Why Us Section -->
      
          <!-- Menu Section -->
          <section id="menu" class="menu section">
      
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Menu</h2>
              <div><span>Check Our Tasty</span> <span class="description-title">Menu</span></div>
            </div><!-- End Section Title -->
            <div class="card">
              <div class="card-body">
                
  
                <!-- Bordered Tabs -->
                <div class="d-flex justify-content-center">
                  <ul class=" menu-filters isotope-filters " id="borderedTab" role="tablist">
                    @if ($categories)
                       
                      @foreach ($categories as $category)
                        <li class="nav-item"  role="presentation">
                          <a class="nav-link {{$loop->index == 0 ? 'active' : ''}}" id="{{$category->slug}}-tab" data-bs-toggle="tab"  data-bs-target="#bordered-{{$category->slug}}"   role="tab" aria-controls="{{$category->slug}}" aria-selected=" {{$loop->index == 0 ? 'true' : 'false'}}">{{$category->name}}</a>
                        </li>
                      @endforeach
                    @else
                        <li><span>Not categories Available</span></li>
                    @endif
                 
                  
                
                  </ul>
                </div>
                
              
              
                <div class="tab-content" id="borderedTabContent">
                  @forelse ($categories as $category)
                    <div class="tab-pane fade {{$loop->index == 0 ? 'active show' : ''}}" id="bordered-{{$category->slug}}" role="tabpanel" aria-labelledby="{{$category->slug}}-tab">
                          <section id="specials" class="specials section">
                            <div class="container" data-aos="fade-up" data-aos-delay="100">
                
                              <div class="row">
                                <div class="col-lg-3">
                                  <ul class="nav nav-tabs flex-column">
                                    @foreach ($category->food as $fooditem)
                                      <li class="nav-item">
                                        <a class="nav-link {{$loop->index == 0 ? 'active show' : ''}}" data-bs-toggle="tab" href="#specials-tab-{{$fooditem->id}}">{{$fooditem->name}}</a>
                                      </li>
                                    @endforeach
                                  
                                  </ul>
                                </div>
                                <div class="col-lg-9 mt-4 mt-lg-0">
                                  <div class="tab-content">
                                  @foreach ($category->food  as $fooditem)
                                      <div class="tab-pane {{$loop->index == 0 ? 'active show' : ''}}" id="specials-tab-{{$fooditem->id}}">
                                        <form id="CartForm{{$fooditem->id}}"  method="post">
                                          @csrf
                                          <div class="row">
                                      
                                            <div class="col-lg-8 details order-2 order-lg-1">
                                              <h3>{{$fooditem->name}}</h3>
                                              <div class="price">
                                                <h3><span>${{$fooditem->price}}</span></h3>
                                              </div>
                                              <p >{{$fooditem->ingredients}}</p>
                                              <h3 style="margin-top: 10px;">Number of order</h3>
                                              <div style="display: flex;align-items: center; margin-top:10px;margin-bottom:20px; ">
                                                <span class="btn btn1" onclick="decrementValue({{$fooditem->id}})">-</span>
                                                <input type="text" style="width:100px;height:40px;text-align: center;border: 1px solid #ccc;" id="numberorder{{$fooditem->id}}" name="quantity" value="1" readonly class="input-quantity" />
                                                <span class="btn btn1" onclick="incrementValue({{$fooditem->id}})">+</span>
                                            
                                              </div>
                                            </div>
                                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                              <img src="{{asset('storage/'.$fooditem->image)}}" alt="" class="img-fluid">
                                          
                                            </div>
                                          
                                          </div>
                                          <div class="d-flex justify-content-center mt-2">
                                            <button type="submit" id="buttoncart{{$fooditem->id}}" value="{{$fooditem->id}}"
                                               style="color: #ffffff; background: #ffb03b; border: 0;padding: 14px 60px;transition: 0.4s;border-radius: 4px;" >
                                              <i class="bi bi-cart-fill"></i> Add to Cart 
                                            </button>
                                          </div>
                                        </form>
                                       
                                      </div>
                                  @endforeach 
                                  
                                  
                              
                                
                                  </div>
                                </div>
                              </div>
                      
                            </div> 
                        </section>   
                    </div>
                  @empty
                   <div>Not Food Available</div>
                 @endforelse
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
          
      
          </section><!-- /Menu Section -->
          
      
          <!-- Events Section -->
          <section id="events" class="events section">
          
            
            <img class="slider-bg" src="{{asset('storage/admin/uploads/events/events-bg.jpg')}}" alt="" data-aos="fade-in">
          

        
   
      
            <div class="container">
      
              <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
                <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                    }
                  }
                </script>
                <div class="swiper-wrapper">
                  @foreach ($events as $event)
                  <div class="swiper-slide">
                    <div class="row gy-4 event-item">
                      <div class="col-lg-6">
                        @if ($event->image)
                          <img src="{{asset('storage/'.$event->image)}}" class="img-fluid" alt="">
                        @endif
                        
                      </div>
                      <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>{{$event->title}}</h3>
                        <div class="price">
                          <p><span>${{$event->price}}</span></p>
                        </div>
                        <p>
                           {{$event->description}}
                        </p>
                      </div>
                    </div>
                  </div><!-- End Slider item -->
                  @endforeach
                
      
             
      
                </div>
                <div class="swiper-pagination"></div>
              </div>
      
            </div>
      
          </section><!-- /Events Section -->
      
          <!-- Book A Table Section -->
          <section id="book-a-table" class="book-a-table section">
            @php
                
                $periods =\Carbon\CarbonPeriod::create('08:00','120 minutes','22:00');
               
            @endphp
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Book A Table</h2>
              <div><span>Book a</span> <span class="description-title">Table</span></div>
            </div><!-- End Section Title -->
      
            <div class="container">
      
              <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
      
                <div class="col-lg-4 reservation-img" style="background-image: url({{asset('storage/reservation.jpg')}});"></div>
      
                <div class="col-lg-8 d-flex align-items-center reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
                  <form role="form"  action="{{route('booking.table')}}" method="post"class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <div class="row gy-4">
                      <div class="col-lg-4 col-md-6">
                        <label class='control-label'> Name</label>
                        <input type="text" name="name" class="form-control" value="{{auth()->user()->name ?? ''}}" id="name" placeholder="Your Name" required="">
                        @error('name')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <label class='control-label'>Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{auth()->user()->email ?? ''}}"  placeholder="Your Email" required="" readonly>
                        @error('email')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <label class='control-label'>Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
                        @error('phone')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <label class='control-label'>Date</label>
                        <input type="date" name="day_booking" class="form-control" id="day_booking" placeholder="Date" min="{{$today}}" max="{{$Add_Week_To_Today}}" required="">
                        @error('day_booking')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <label class='control-label'>Number OF Table</label>
                        <select name="table_id" id="table_id">
                          <option value="">please choose table</option>
                          @foreach ($tables as $table)
                           <option value="{{$table->id}}">{{$table->name}}</option> 
                          @endforeach
                                 
                     
                          @error('number_table')
                          <small class="form-text text-danger">{{$message}}</small>
                          @enderror
                          
                        </select>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <label class='control-label'>Time</label>
                        <select name="time_booking" id="time_booking" required>
                          <option value="">please choose time</option>
                          @foreach ($periods as $period)
                                  <option value="{{ $period->format('H:i')}}">{{$period->format('H:i')}}</option>
                          @endforeach
                          @error('time_booking')
                          <small class="form-text text-danger">{{$message}}</small>
                          @enderror
                          
                        </select>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <label class='control-label'>NO People</label>
                        <input type="number" class="form-control" value="1" name="number_people" id="people" placeholder="# of people" required="">
                        @error('number_people')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                      </div>
                  
                    </div>
      
                    <div class="form-group mt-3" style="margin-left:5px;">
                      <label class='control-label'>Message</label>
                      <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                      <h4 style="color: #ffb03b;">Payment Reservation</h4>
                     
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                      <p>Reservation per person for ($100)</p>
                    </div>
                        
                        <div class='form-row row'>
                          <div class='col-xs-12 form-group required'>
                              <label class='control-label'>Name on Card</label> <input
                                  class='form-control' size='4' type='text'>
                          </div>
                      </div>

                      <div class='form-row row'>
                          <div class='col-xs-12 form-group  required'>
                              <label class='control-label'>Card Number</label> <input
                                  autocomplete='off' class='form-control card-number' size='20'
                                  type='text'>
                          </div>
                      </div>

                      <div class='form-row row'>
                          <div class='col-xs-12 col-md-4 form-group cvc required'>
                              <label class='control-label'>CVC</label> <input autocomplete='off'
                                  class='form-control card-cvc' placeholder='ex. 311' size='4'
                                  type='text'>
                          </div>
                          <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Month</label> <input
                                  class='form-control card-expiry-month' placeholder='MM' size='2'
                                  type='text'>
                          </div>
                          <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Year</label> <input
                                  class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                  type='text'>
                          </div>
                      </div>
                      <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Money paid:$</label> 
                            <input type="text" id="resultInput" name="value" value="100" class='form-control'readonly required>

                        </div>
                     </div>
                      <div class='form-row row'>
                          <div class='col-md-12 error form-group d-none hide' id="myAlert">
                              <div class='alert-danger alert'>Please correct the errors and try
                                  again.</div>
                          </div>
                      </div>
                  
          
                        <div class="text-center mt-3">

                          <button type="submit" style="color: #ffffff; background: #ffb03b; border: 0;padding: 14px 60px;transition: 0.4s;border-radius: 4px;" >Book a Table</button>
                        </div>
                  </form>
                </div><!-- End Reservation Form -->
      
              </div>
      
            </div>
      
          </section><!-- /Book A Table Section -->
      
          <!-- Gallery Section -->
          <section id="gallery" class="gallery section">
      
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Gallery</h2>
              <div><span>Some photos from</span> <span class="description-title">Our Restaurant</span></div>
            </div><!-- End Section Title -->
      
            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
      
              <div class="row g-0">
                @if ($galleries)
                
                    @forelse ($galleries as $gallery)
                        <div class="col-lg-3 col-md-4" id="gallery-item-{{ $gallery->id }}">
                            <a href="{{asset('/storage/'.$gallery->image)}}" class="glightbox" data-gallery="images-gallery">
                                <img src="{{asset('/storage/'.$gallery->image)}}" alt="" class="img-fluid" >
                            </a>
                        </div>
                    @empty
                     <h2 class="text-primary text-center">Not Image Available</h2>
                    @endforelse
                   
                 
                @endif
         
              </div>
      
            </div>
      
          </section><!-- /Gallery Section -->
      
          <!-- Chefs Section -->
          <section id="chefs" class="chefs section">
      
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Chefs</h2>
              <div><span>Our Professional</span> <span class="description-title">Chefs</span></div>
            </div><!-- End Section Title -->
      
            <div class="container">
      
              <div class="row gy-5">
               @forelse ($chefs as $chef)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                  <div class="member">
                    <div class="pic">
                      @if ($chef->image != null)
                       <img src="{{asset('storage/'.$chef->image)}}" class="img-fluid" alt="">
                      @else
                       <img src="{{asset('storage/user/uploads/avaters/userprofile.jpg')}}" class="img-fluid" alt="" width="600px" height="600px">
                      @endif
                     
                    </div>
                    <div class="member-info">
                      <h4>{{$chef->name}}</h4>
                      <span>{{$chef->title}}</span>
                      <div class="social">
                        @if ($chef->twitter != null)
                         <a href="{{$chef->twitter}}"><i class="bi bi-twitter-x"></i></a>
                        @endif
                        @if ($chef->facebook != null)
                         <a href="{{$chef->facebook}}"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if ($chef->instagram != null)
                         <a href="{{$chef->instagram}}"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if ($chef->linkedin != null)
                         <a href="{{$chef->linkedin}}"><i class="bi bi-linkedin"></i></a>
                        @endif
                    
                      </div>
                    </div>
                  </div>
                </div><!-- End Team Member -->
               @empty
                <div class="row justify-content-center">
                  <div class="col-md-8 text-center">
                     <h4>No Chefs In the current period</h4>
                  </div>
                </div>
               @endforelse
              
      
   
              </div>
      
            </div>
      
          </section><!-- /Chefs Section -->
      
          <!-- Testimonials Section -->
          <section id="testimonials" class="testimonials section dark-background">
           
                <img src="{{asset('storage/testimonials-bg.jpg')}}" class="testimonials-bg" alt="">
          
                <div class="container" data-aos="fade-up" data-aos-delay="100">
          
                  <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                      {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                          "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                          "el": ".swiper-pagination",
                          "type": "bullets",
                          "clickable": true
                        }
                      }
                    </script>
                    <div class="swiper-wrapper">
                      @forelse ($feedbacks as $feedback)
                          <div class="swiper-slide">
                            <div class="testimonial-item">
                              <img src="{{asset('storage/'.$feedback->user->image)}}" class="testimonial-img" alt="">
                              <h3>{{$feedback->user->name}}</h3>
                            
                              <div class="stars">
                                @for ($i = 0; $i < $feedback->rate; $i++)
                                <i class="bi bi-star-fill"></i> 
                                @endfor
                                
                              </div>
                              <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>{{$feedback->message}}</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                              </p>
                            </div>
                          </div><!-- End testimonial item -->
                      @empty
            
                      @endforelse   
                    </div>
                    <div class="swiper-pagination"></div>
                  </div>
          
                </div>
        

      
          </section><!-- /Testimonials Section -->
      
          <!-- Contact Section -->
          <section id="contact" class="contact section">
      
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Contact</h2>
              <div><span>Check Our</span> <span class="description-title">Contact</span></div>
            </div><!-- End Section Title -->
      
            <div class="mb-5">
              <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen=""></iframe>
            </div><!-- End Google Maps -->
      
            <div class="container" data-aos="fade">
      
              <div class="row gy-5 gx-lg-5">
      
                <div class="col-lg-4">
      
                  <div class="info">
                    <h3>Get in touch</h3>
                    <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia commodi minus.</p>
      
                    <div class="info-item d-flex">
                      <i class="bi bi-geo-alt flex-shrink-0"></i>
                      <div>
                        <h4>Location:</h4>
                        <p>{{$appsetting->address ?? 'Address not Available'}}</p>
                      </div>
                    </div><!-- End Info Item -->
      
                    <div class="info-item d-flex">
                      <i class="bi bi-envelope flex-shrink-0"></i>
                      <div>
                        <h4>Email:</h4>
                        <p>{{$appsetting->email ?? 'Email not Available'}}</p>
                      </div>
                    </div><!-- End Info Item -->
      
                    <div class="info-item d-flex">
                      <i class="bi bi-phone flex-shrink-0"></i>
                      <div>
                        <h4>Call:</h4>
                        <p>{{$appsetting->phone ?? 'Phone not Available'}}</p>
                      </div>
                    </div><!-- End Info Item -->
      
                  </div>
      
                </div>
      
                <div class="col-lg-8">
                  <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
                    </div>
                    <div class="form-group mt-3">
                      <textarea class="form-control" name="message" placeholder="Message" required=""></textarea>
                    </div>
                    <div class="my-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                  </form>
                </div><!-- End Contact Form -->
      
              </div>
      
            </div>
      
          </section><!-- /Contact Section -->
          @auth('web')
              <div id="feedback-form-wrapper">
                <div id="feedback-button">
                  <button type="button" class="btn  btn-lg rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: #ffffff; background: #ffb03b;">
                    Feedback
                  </button>
                </div>
          
                <div id="feedback-form-modal">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Feedback Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{route('send.feedback')}}" method="POST">
                            @csrf
                              <div class="modal-body">
                          
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">How likely you would like to recommand us to your friends?</label>
                                    <div class="rating-input-wrapper d-flex justify-content-between mt-3">
                                      <label><input type="radio" name="rate" value="1"/><span class="border rounded px-3 py-2">1</span></label>
                                      <label><input type="radio" name="rate" value="2"/><span class="border rounded px-3 py-2">2</span></label>
                                      <label><input type="radio" name="rate" value="3" /><span class="border rounded px-3 py-2">3</span></label>
                                      <label><input type="radio" name="rate" value="4" /><span class="border rounded px-3 py-2">4</span></label>
                                      <label><input type="radio" name="rate" value="5"/><span class="border rounded px-3 py-2">5</span></label>
            
                        
                                    </div>
                                    <div class="rating-labels d-flex justify-content-between mt-2">
                                      <label>Very unlikely</label>
                                      <label>Very likely</label>
                                    </div>
                                    @error('rate')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                  </div>
                              
                                  <div class="form-group">
                                    <label for="input-two">Would you like to say something?</label>
                                    <textarea class="form-control mt-2" name="message" id="input-two" rows="4"></textarea>
                                  </div>
                                  @error('message')
                                  <small class="form-text text-danger">{{$message}}</small>
                                  @enderror
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send Feedback</button>
                              </div>
                          </form> 
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          @endauth
    
@endsection
@section('scripts')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
  
  $(function() {
    
      /*------------------------------------------
      --------------------------------------------
      Stripe Payment Code
      --------------------------------------------
      --------------------------------------------*/
      
      var $form = $(".require-validation");
       
      $('form.require-validation').bind('submit', function(e) {
          var $form = $(".require-validation"),
          inputSelector = ['input[type=email]', 'input[type=password]',
                           'input[type=text]', 'input[type=file]',
                           'textarea'].join(', '),
          $inputs = $form.find('.required').find(inputSelector),
          $errorMessage = $form.find('div.error'),
          valid = true;
          var alert = document.getElementById('myAlert');
          alert.classList.remove('d-none');
          $errorMessage.addClass('hide');
      
          $('.has-error').removeClass('has-error');
          $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
              $input.parent().addClass('has-error');
              $errorMessage.removeClass('hide');
              e.preventDefault();
            }
          });
       
          if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
              number: $('.card-number').val(),
              cvc: $('.card-cvc').val(),
              exp_month: $('.card-expiry-month').val(),
              exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
          }
      
      });
        
      /*------------------------------------------
      --------------------------------------------
      Stripe Response Handler
      --------------------------------------------
      --------------------------------------------*/
      function stripeResponseHandler(status, response) {
          if (response.error) {
              $('.error')
                  .removeClass('hide')
                  .find('.alert')
                  .text(response.error.message);
          } else {
              /* token contains id, last4, and card type */
              var token = response['id'];
                   
              $form.find('input[type=text]').empty();
              $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
              $form.get(0).submit();
          }
      }
       
  });
</script>
<script>
  // Add event listener to the input field
  document.getElementById('people').addEventListener('input', function() {
        // Get the value from the input field
        var number = this.value;
          if(number <= 0){
             this.value = 1;
             var number = 1;
          }
        // Multiply the number by 100
        var result = number * 100;

        // Display the result in the output element
        document.getElementById('resultInput').value =result;
    });
</script>
<script>
  
  // Initialize a counter variable
  var counter = 1;
    function incrementValue(id) {
      
      // Get the input element by its id
      var inputElement = document.getElementById('numberorder'+id);
      
    
      // Increment the counter
      counter++;
      if (inputElement.value == 1) {
        counter = 1 ;
        counter++;
        inputElement.value = counter;
      } else {
        inputElement.value = counter;
      }

    }
    function decrementValue(id) {
      
      // Get the input element by its id
      var inputElement = document.getElementById('numberorder'+id);
      
      // Increment the counter
      counter--;
      if (counter == 0) {
          counter = 1;
          
      }

      // Update the value of the input element
      inputElement.value = counter;
    }


</script>
<script>
  $(document).ready(function() {
      // Trigger fetching of time slots when a date is selected
          $('#table_id').on('change', function() {
                  let selectedDate = $('#day_booking').val();
                  let selectedTable = $(this).val();
                  
                  // Ensure both date and table are selected
                  if (selectedDate && selectedTable) {
                      // Fetch available time slots based on the selected date and table
                      $.ajax({
                          url: "{{ route('available.time') }}",
                          type: "GET",
                          data: {
                              day_booking: selectedDate,
                              table_id: selectedTable
                          },
                          success: function(response) {
                              $('#time_booking').empty();
                              $('#time_booking').append('<option value="">Select a time slot</option>');
                              response.forEach(function(slot) {
                                  $('#time_booking').append('<option value="'+slot+'">'+slot+'</option>');
                              });
                          }
                      });
                  }
      });
  });
</script> 
<script>
      $(document).ready(function () {
        $('form[id^="CartForm"]').on('submit', function (e) {
          
            e.preventDefault();

            var form = $(this);
            // Get the food ID from the form ID or button value
            var id = form.find('button[type="submit"]').val();

           // Collect form data (including CSRF token and quantity)
           var formData = {
                _token: form.find('input[name="_token"]').val(),
                quantity: form.find('#numberorder' + id).val()
            };

            // Build the dynamic URL using the ID
            var actionUrl = "{{ route('add.to.cart', ':id') }}".replace(':id', id);
            $.ajax({
                url: actionUrl, // Use the dynamic URL with the ID
                type: 'POST',
                data: formData,
                success: function (response) {
                          // Use SweetAlert based on the server response
                    if (response.status === 'exists') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Item Already Added!',
                            text: 'This item is already in your cart.',
                            showCloseButton: true,
                            timer: 10000
                        });
                    } else if (response.status === 'added') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Added to Cart',
                            text: 'The item has been added to your cart successfully!',
                            showCloseButton: true,
                            timer: 10000
                        });
                    }
                },
                error: function (response) {
                      Swal.fire({
                        icon: 'info',
                        title: 'Login',
                        text: 'Please Login To Continue',
                        showCloseButton: true,
                        timer: 10000
                    });
                }
            });
        });
    });
</script> 
@endsection