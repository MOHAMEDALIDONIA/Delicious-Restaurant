<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href={{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}} rel="stylesheet">
    <style>
        .register-container {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .register-title {
            text-align: center;
            color:#ffb03b;
            margin-bottom: 20px;
        }

        .btn-register {
            background-color:#ffb03b;
            color: white;
        }

        .btn-register:hover {
            background-color: #cc7000;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4 register-container">
            <a href="{{route('home.page')}}" style="text-decoration: none;"><h1 class="register-title">Delicious Restaurant</h1></a>
                <h2 class="register-title">Register</h2>
                <form  method="POST" action="{{ route('register.user.store') }}" enctype="multipart/form-data">
                   @csrf
                   <div class="col-md-12 mt-2">
                        <label  class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{Request::old('name')}}"  required>
                        
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    
                   </div>
                    <div class="col-md-12 mt-2">
                        <label  class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{Request::old('email')}}"  required>
                        
                            @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        
                    </div>
                    <div class="col-md-12 mt-2">
                        <label  class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                        
                            @error('image')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        
                    </div>
                    <div class="col-md-12 mt-2">
                        <label  class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                        
                            @error('password')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                      
                        
                    </div>
                    <div class="col-md-12 mt-2">
                        <label  class="form-label">Password Confirm</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                        
                            @error('password_confirmation')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                      
                        
                    </div>
              
              
                  <div class="mt-2">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                  </div>
                
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-register">register</button>
                    </div>
                </form>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>
</body>
</html>
          
     
      
    
     
   


