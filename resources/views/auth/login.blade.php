<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href={{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}} rel="stylesheet">
    <style>
        .login-container {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .login-title {
            text-align: center;
            color:#ffb03b;
            margin-bottom: 20px;
        }

        .btn-login {
            background-color:#ffb03b;
            color: white;
        }

        .btn-login:hover {
            background-color: #cc7000;
            color: white;
        }
    </style>
     
</head>
<body>
    
  

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4 login-container">
               <a href="{{route('home.page')}}" style="text-decoration: none;"><h1 class="login-title">Delicious Restaurant</h1></a>
                <h2 class="login-title">Login</h2>
                <form  method="POST" action="{{ route('login') }}">
                   @csrf
                    <div class="col-md-12 mt-2">
                        <label  class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{Request::old('email')}}"  required>
                        
                            @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        
                    </div>
                    <div class="col-md-12 mt-2">
                        <label  class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                        
                            @error('password')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                          @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                          @endif
                        
                    </div>
              
                   <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                  </div>
                  <div class="mt-2">
                    Don't have an account?,  
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{route('register.user')}}">
                    Sign Up
                    </a>
                  </div>
                
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-login">Login</button>
                    </div>
                </form>
               
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>
    <script>

    </script>
    
</body>
</html>
          
     
      
    
     
   

