<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Login  </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin-assets/images/logo/logo.png')}}">
    <link rel="stylesheet" href="">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('admin-assets/css/app.min.css')}}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url({{asset('4168.jpg')}})">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100"> 
                        <div class="col-md-5">
                            <img  alt="" src="{{asset('admin-assets/images/logo/gl-house-logo.png')}}" width="40%" style="margin-top: -220px;
                            margin-left: 160px;">
                        </div>
                        <div class="col-md-6 col-lg-6 m-h-auto">
                            <div class="card shadow-lg m-l-0">
                                <div class="card-body">
                                    <div class=" m-b-30 ">
                                        
                                        <h2 class="m-b-0 text-center">User Login</h2>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-8">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback text-center" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                             
                                            </div>
                                            @if(session('error'))
                                        
                                            
                                         
                                     @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center mb-2">
                                                <span class="text-danger ">  <b>{{session('error')}}</b></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-8">
                                                <div class="input-affix m-b-10">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    <i class="suffix-icon fas fa-eye" id="eye2"></i>
                                                </div>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>

                                                {{-- @if (Route::has('password.request'))
                                                    <a  href="{{ route('password.request') }}">
                                                        {{ __('Forgot Password?') }}
                                                    </a>
                                                @endif --}}
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-center m-t-20">Or sign up With </p>
                                            </div>
                                        </div> -->
                                    </form>
                                    <!-- <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-10 text-center">
                                            <button class="btn btn-icon btn-danger btn-rounded btn-tone ml-2" title="Sign Up with Google"> <i class="anticon anticon-google"></i>  </button>
                                            <button class="btn btn-icon btn-primary btn-rounded btn-tone ml-2" title="Sign Up with facebook"> <i class="anticon anticon-facebook"></i>  </button>
                                            <button class="btn btn-icon btn-success btn-rounded ml-2" title="Sign Up with Twitter">
                                                <i class="anticon anticon-twitter"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">&copy <?php echo date('Y');?> ThemeNate</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="{{asset('admin-assets/js/vendors.min.js')}}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{asset('admin-assets/js/app.min.js')}}"></script>
    <script>
  
        var newpwd = document.getElementById('password');
       
        var eye2 = document.getElementById('eye2');

        eye2.addEventListener('click',togglePass1);

        function togglePass1(){
        eye2.classList.toggle('fa-eye');
        eye2.classList.toggle('fa-eye-slash');
        (newpwd.type=='password')? newpwd.type='text' :
        newpwd.type='password';
       
        
        
        

    }
    </script>
</body>

</html>