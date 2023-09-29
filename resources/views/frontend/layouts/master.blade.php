<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kanak - URL Shortner</title>


    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">

    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">

    
  {{-- toastr css  --}}
  <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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


    <!--============= Header Section Starts Here =============-->
  @include('frontend.inc.header')

    
    <!--============= Header Section Ends Here =============-->

@yield('content')
    <!--============= Footer Section Starts Here =============-->
    @include('frontend.inc.footer')
    <!--============= Footer Section Ends Here =============-->




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

    
  <!-- toastr JS File -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    

  <script>
    @if(Session::has('message'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.warning("{{ session('warning') }}");
    @endif
  </script>
  
  @stack('script')
</body>

</html>