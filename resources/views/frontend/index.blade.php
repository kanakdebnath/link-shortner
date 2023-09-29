@extends('frontend.layouts.master')

@section('content')

    <!--============= Banner Section Starts Here =============-->
    <section class="banner-section">
        <div class="banner-bg bg_img" data-background="{{ asset('frontend/assets/images/banner/banner-bg.jpg') }}">
            <div class="banner-bg-shape"><img src="{{ asset('frontend/assets/images/banner/banner-shape.png') }}" alt="banner"></div>
            <div class="round-1">
                <img src="{{ asset('frontend/assets/images/banner/01.png') }}" alt="banner">
            </div>
            <div class="round-2">
                <img src="{{ asset('frontend/assets/images/banner/02.png') }}" alt="banner">
            </div>
        </div>
        <div class="container">
            <div class="banner-content">
                <h3 class="cate">SHORTEN URLS AND</h3>
                {{-- <h1 class="title">Earn Money</h1> --}}
                <p>Transforming long, ugly links into Shorten URLs</p>
            </div>
            <div class="banner-form-group">
                <h3 class="subtitle">Shorten URL Is Just Simple</h3>
                <form method="POST" data-action="{{ route('link_short') }}" id="short" class="banner-form" >
                    @csrf
                    <input id="url" type="text" placeholder="Your URL here" name="url" required>
                    <div>
                        <button class="hide" type="submit">Shorten <i class="flaticon-startup"></i></button>
                        <button onclick="Copy()" style="display: none" class="show" type="submit">Copy <i class="flaticon-share"></i></button>
                    </div>
                </form>
                <div class="banner-counter">
                    <div class="counter-item">
                        <h2 class="counter-title"><span class="counter">1,200,000</span>+</h2>
                        <p>Links clicked per day</p>
                    </div>
                    <div class="counter-item">
                        <h2 class="counter-title"><span class="counter">348,000,000</span>+</h2>
                        <p>Shortened links in total</p>
                    </div>
                    <div class="counter-item">
                        <h2 class="counter-title"><span class="counter">1,180,000</span>+</h2>
                        <p>Happy users registered</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->

@endsection
@push('script')
<script type="text/javascript"> 

    $('#short').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var action = $(this).data('action');
        var url = $('#url').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: action,
            data: formData,
            success: function (data) {
                toastr.success(data.data.message);
                $('#url').val(data.data.link.link);
                $('.hide').hide();
                $('.show').show();
                
            },
            contentType: false,
            processData: false,       
        });
    });


    function Copy() {
        var Url = document.getElementById("url");
        Url.innerHTML = window.location.href;
        Url.select();
        document.execCommand("copy");
        $('#url').val('');
        $('.hide').show();
        $('.show').hide();
    }
    
        
      </script>
@endpush
