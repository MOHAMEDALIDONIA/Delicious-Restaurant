<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href={{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}} rel="stylesheet">
    <style>
        .reset-container {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .reset-title {
            text-align: center;
            color:#ffb03b;
            margin-bottom: 20px;
        }

        .btn-reset {
            background-color:#ffb03b;
            color: white;
        }

        .btn-reset:hover {
            background-color: #cc7000;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4 reset-container">
            <a href="{{route('home.page')}}" style="text-decoration: none;"><h1 class="reset-title">Delicious Restaurant</h1></a>
                <h2 class="reset-title">reset Password</h2>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{session('status')}}
                        
                    </div>
                
                @endif
             
                <form  method="POST" action="{{ route('password.store') }}">
                   @csrf
                     <!-- Password Reset Token -->
                     <input type="hidden" name="token" value="{{ $request->route('token') }}">
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
                      
                        
                    </div>
                    <div class="col-md-12 mt-2">
                        <label  class="form-label">Password Confirm</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                        
                            @error('password_confirmation')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                      
                        
                    </div>
                
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-reset">Reset Password</button>
                    </div>
                </form>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>
</body>
</html>
          
     
      
    
     
   



