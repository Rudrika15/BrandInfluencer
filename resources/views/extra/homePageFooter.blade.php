<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h4>About Brandbeans</h4>
                <p>Brand Beans is a leading one-stop window to explore and shop unique lifestyle and utility products.
                    We have been showcasing the best and out-of-the-box range of products that will level up your living
                    style.</p>
                <a href="{{ route('about') }}" class="explore_btn">Explore More <span><i
                            class='bx bx-right-arrow-alt'></i></span></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 quick_links">
                <h4>Quick Links</h4>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <ul>
                            <li><a href="{{ route('term') }}">Terms</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy</a></li>
                            <li><a href="{{ route('refund') }}">Refund</a></li>
                            {{-- <li><a href="#">Showcase</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 download_app">
                <h4>Download App</h4>
                <ul>
                    <li>
                        <a href="#"><img src="{{ asset('assetshtml/images/appstore_icon.png') }}"
                                height="50" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('assetshtml/images/playstore_icon.png') }}"
                                height="50" /></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bottom_stripe">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                    <p>Copyright 2024 © Brandbeans</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 social_media">
                    <ul>
                        <li>
                            <a href="#"><img src="{{ asset('assetshtml/images/fb_icon.png') }}" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('assetshtml/images/insta_icon.png') }}" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->


<script>
    var currentYear = new Date().getFullYear();
    var yearElement = document.getElementById('year');
    yearElement.textContent = currentYear;
</script> --}}
