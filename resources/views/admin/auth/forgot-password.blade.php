<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reset Password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href={{asset('admin/assets/img/favicon.png')}} rel="icon">
  <link href={{asset('admin/assets/img/apple-touch-icon.png')}} rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href={{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
  <link href={{asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}} rel="stylesheet">
  <link href={{asset('admin/assets/vendor/boxicons/css/boxicons.min.css')}} rel="stylesheet">
  <link href={{asset('admin/assets/vendor/quill/quill.snow.css')}} rel="stylesheet">
  <link href={{asset('admin/assets/vendor/quill/quill.bubble.css')}} rel="stylesheet">
  <link href={{asset('admin/assets/vendor/remixicon/remixicon.css')}} rel="stylesheet">
  <link href={{asset('admin/assets/vendor/simple-datatables/style.css')}} rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href={{asset('admin/assets/css/style.css')}} rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  
                  <span class="d-none d-lg-block">Delicious Admin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Forgot Password</h5>
                      <p class="text-center small">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    </div>
                     @if (session('message'))
                      <div class="alert alert-primary" role="alert">
                         {{session('message')}}
                      </div>
                     @endif
                    <form class="row g-3 needs-validation" novalidate action="{{ route('password.email.admin') }}" method="POST">
                      @csrf
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          
                          <input type="email" name="email" class="form-control" id="yourUsername" required>
                          @error('email')
                           <div class="invalid-feedback">
                            <small class="form-text text-danger">{{$message}}</small>
                           </div>
              
                          @enderror
                      
                          <div class="invalid-feedback">Please enter your email.</div>
                        </div>
                      </div>

                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Email Password Reset Link</button>
                      </div>
               
                    </form>
  
                  </div>
              </div>

         

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src={{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}></script>
  <script src={{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>
  <script src={{asset('admin/assets/vendor/chart.js/chart.umd.js')}}></script>
  <script src={{asset('admin/assets/vendor/echarts/echarts.min.js')}}></script>
  <script src={{asset('admin/assets/vendor/quill/quill.min.js')}}></script>
  <script src={{asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}></script>
  <script src={{asset('admin/assets/vendor/tinymce/tinymce.min.js')}}></script>
  <script src={{asset('admin/assets/vendor/php-email-form/validate.js')}}></script>

  <!-- Template Main JS File -->
  <script src={{asset('admin/assets/js/main.js')}}></script>
  <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>

</body>

</html>