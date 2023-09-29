<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('frontend/assets/images/logo/logo.png') }}" alt="logo">
                </a>
            </div>
            
            <div class="header-bar d-lg-none mr-sm-3">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="header-right">
                @if (Auth::check())
                <a href="{{ url('home') }}" class="header-button d-none d-sm-inline-block m-0 active">Dashboard</a>
                <a href="{{ route('logout') }}" class="header-button d-none d-sm-inline-block m-0">Logout</a>
                @else
                <a href="{{ route('login') }}" class="header-button d-none d-sm-inline-block m-0 active">Login</a>
                <a href="{{ route('register') }}" class="header-button d-none d-sm-inline-block m-0">Register</a>
                @endif
                
            </div>
        </div>
    </div>
</header>