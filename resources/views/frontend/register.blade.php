<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Cortaly - URL Shortner HTML Template</title>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">

    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">
    
  
</head>

<body>

    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->

    <!--============= Sign In Section Starts Here =============-->
    <div class="account-section bg_img" data-background="{{ asset('frontend/assets/images/account-bg.jpg') }}">
        <div class="container">
            <div class="account-title text-center">
                <a href="{{ url('/') }}" class="back-home"><i class="fas fa-angle-left"></i><span>Back <span class="d-none d-sm-inline-block">To Home</span></span></a>
                <a href="{{ url('/') }}" class="logo">
                    <img style='width:25%' src="{{ asset('frontend/assets/images/logo/logo.png') }}" alt="logo">
                </a>
            </div>
            <div class="account-wrapper">
                <div class="account-header">
                    <h4 class="title">Let's get started</h4>
                </div>
                <div class="account-body">
                    <span class="d-block mb-20">Sign up with your work email</span>
                    <form method="POST" class="account-form" {{ route('register') }}>
                        @csrf
                        <div class="form-group">
                            <label for="sign-up-name">Your Name </label>
                            <input type="text" name="name" placeholder="Enter Your Name " id="sign-up-name">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sign-up">Your Email </label>
                            <input type="text" placeholder="Enter Your Email " id="sign-up">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sign-up-phone">Your Phone </label>
                            <input type="text" name="phone" placeholder="Enter Your Phone " id="sign-up-phone">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sign-up-password">Your Password </label>
                            <input type="text" name="password" placeholder="Enter Your Password " id="sign-up-password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Your Confirm Password </label>
                            <input type="text" name="password_confirmation" placeholder="Enter Your Confirm Password " id="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <button type="submit">Register</button>
                            <span class="d-block mt-15">Already have an account? <a href="{{ route('login') }}">Sign In</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--============= Sign In Section Ends Here =============-->


    <script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/paroller.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>


</body>

</html>