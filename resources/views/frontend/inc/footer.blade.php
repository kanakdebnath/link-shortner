<footer class="footer-section padding-top">
    <div class="footer-bg bg_img" data-background="{{ asset('frontend/assets/images/footer/footer-bg.jpg') }}"></div>
    <div class="footer-bg d-md-block d-none"><img src="{{ asset('frontend/assets/images/footer/wave.png') }}" alt="footer"></div>
    <div class="container">
        <div class="section-header cl-white-499">
            <h5 class="cate">Contact Us</h5>
            <h2 class="title">Get in touch!</h2>
            <p>We thrive to ensure that you get the most out of your experience</p>
        </div>
        <form class="contact-form" method="post" action="{{ route('contact_submit') }}" id="contact_form_submit">
            @csrf
            @if (session()->has('success'))
                <span class="text-success">{{ session()->get('success') }}</span>
            @endif
            <div class="form-group">
                <label for="name">Your Full Name</label>
                <input type="text" required name="name" id="name" placeholder="Enter Your Full Name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="text" required name="email" id="email" placeholder="Enter Your Email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" required id="message" placeholder="Enter Your Message"></textarea>
                @if ($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                @endif
            </div>
            <div class="form-group check-group">
                <input type="checkbox" id="check" required>
                <label for="check">I agree to receive emails, newsletters and promotional messages</label>
            </div>
            <div class="form-group text-center">
                <button type="submit">Send Message</button>
            </div>
        </form>
        <div class="footer-bottom">
            <div class="footer-bottom-area">
                <div class="left cl-white">
                    <p>&copy; Copyright {{ date('Y') }} | <a href="https://kanakdebnath.com/">Kanak Debnath</a></p>
                </div>
                <ul class="social-icons">
                    <li>
                        <a href="https://www.facebook.com/kanaksoftdev" class="active">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/kanakdebnath826" class="">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UClnkBwrovgD34O3D27R47yQ" class="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/kanakdebnath826/" class="">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>