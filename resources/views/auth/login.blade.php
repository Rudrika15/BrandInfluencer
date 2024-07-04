<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assetshtml/css/custom.css') }}" />

    <!-- Box Icons CSS -->
    <link href="{{ asset('assetshtml/css/boxicons.min.css') }}" rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assetshtml/css/bootstrap.css') }}">

    <!-- Owl CSS -->
    <link rel="stylesheet" href="{{ asset('assetshtml/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetshtml/css/owl.theme.default.min.css') }}">

    <!-- Brand Story Slider CSS -->
    <link rel="stylesheet" href="{{ asset('assetshtml/css/swiper-bundle.min.css') }}">

    <!-- WOW Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assetshtml/css/animate.css') }}">
    <style>
        @media only screen and (min-width: 767px) and (max-width: 980px) {
            header .navbar .nav-item .side-menu-close {
                display: none !important;
            }
        }
    </style>
</head>



<body>

    @include('extra.homePageMenu')

    <div class="container" style="margin-top: 100px; max-width: 500px; margin-bottom: 100px">
        <div class="card">



            {{-- <div class="text-info text-center pb-4 fw-bold"><img src="{{ asset('images/logo.png') }}" class="w-25" alt=""></div> --}}
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control " id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div style="margin-bottom: 20px;">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-2 text-end">

                            <button type="button" class="btn btn-outline-secondary " id="togglePassword">
                                <i class="bi bi-eye-slash" id="eyeIcon"></i>
                                <!-- Eye slash icon represents hidden password by default -->
                            </button>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>

                <div style="display:  flex;  justify-content: space-between">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    @if (Route::has('password.request'))
                        <div class="pt-3" style="margin-top: 15px !important"><a
                                href="{{ route('password.request') }}" class="a-link">Forgot
                                password?</a></div>
                    @endif
                </div>
            </form>
            <hr>
            <div class="pt-2" style="display: flex; justify-content: center">
                <a href="{{ route('otp.login') }}" class="a-link"><i class="fa fa-user-plus"></i>Login with OTP</a>
                {{-- <a href="{{ route('register') }}" class="a-link"><i class="fa fa-user-plus"></i>Register</a> --}}
            </div>
        </div>

    </div>




    @include('extra.homePageFooter')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap core JS-->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script> --}}
    <script>
        // auto generated side menu from top header menu start
        var topHeaderMenu = $('header nav > ul').clone();
        var sideMenu = $('.side-menu-wrap nav');
        sideMenu.append(topHeaderMenu);
        if ($(sideMenu).find('.sub-menu').length != 0) {
            $(sideMenu).find('.sub-menu').parent().append('<i class="fas fa-chevron-right d-flex align-items-center"></i>');
        }
        // auto generated side menu from top header menu end

        // close menu when clicked on menu link start
        // $('.side-menu-wrap nav > ul > li > a').on('click', function () {
        //   sideMenuCloseAction();
        // });
        // close menu when clicked on menu link end

        // open close sub menu of side menu start
        var sideMenuList = $('.side-menu-wrap nav > ul > li > i');
        $(sideMenuList).on('click', function() {
            if (!($(this).siblings('.sub-menu').hasClass('d-block'))) {
                $(this).siblings('.sub-menu').addClass('d-block');
            } else {
                $(this).siblings('.sub-menu').removeClass('d-block');
            }
        });
        // open close sub menu of side menu end

        // side menu close start
        $('.side-menu-close').on('click', function() {
            if (!($('.side-menu-close').hasClass('closed'))) {
                $('.side-menu-close').addClass('closed');
            } else {
                $('.side-menu-close').removeClass('closed');
            }
        });
        // side menu close end

        // auto append overlay to body start
        $('.wrapper').append('<div class="custom-overlay h-100 w-100"></div>');
        // auto append overlay to body end

        // open side menu when clicked on menu button start
        $('.side-menu-close').on('click', function() {
            if (!($('.side-menu-wrap').hasClass('opened')) && !($('.custom-overlay').hasClass('show'))) {
                $('.side-menu-wrap').addClass('opened');
                $('.custom-overlay').addClass('show');
            } else {
                $('.side-menu-wrap').removeClass('opened');
                $('.custom-overlay').removeClass('show');
            }
        })
        // open side menu when clicked on menu button end

        // close side menu when clicked on overlay start
        $('.custom-overlay').on('click', function() {
            sideMenuCloseAction();
        });
        // close side menu when clicked on overlay end

        // close side menu when swiped start
        var isDragging = false,
            initialOffset = 0,
            finalOffset = 0;
        $(".side-menu-wrap")
            .mousedown(function(e) {
                isDragging = false;
                initialOffset = e.offsetX;
            })
            .mousemove(function() {
                isDragging = true;
            })
            .mouseup(function(e) {
                var wasDragging = isDragging;
                isDragging = false;
                finalOffset = e.offsetX;
                if (wasDragging) {
                    if (initialOffset > finalOffset) {
                        sideMenuCloseAction();
                    }
                }
            });
        // close side menu when swiped end


        function sideMenuCloseAction() {
            $('.side-menu-wrap').addClass('open');
            $('.wrapper').addClass('freeze');
            $('.custom-overlay').removeClass('show');
            $('.side-menu-wrap').removeClass('opened');
            $('.side-menu-close').removeClass('closed');
            $(sideMenuList).siblings('.sub-menu').removeClass('d-block');
        }
        // close side menu when clicked on overlay end

        // close side menu over 992px start
        $(window).on('resize', function() {
            if ($(window).width() >= 992) {
                sideMenuCloseAction();
            }
        })
        // close side menu over 992px end
    </script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>




    <script type='text/javascript'>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                var passwordField = $('#password');
                var passwordFieldType = passwordField.attr('type');

                // Toggle password visibility and change eye icon accordingly
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $('#eyeIcon').removeClass('bi-eye-slash').addClass('bi-eye');
                } else {
                    passwordField.attr('type', 'password');
                    $('#eyeIcon').removeClass('bi-eye').addClass('bi-eye-slash');
                }
            });
        });
    </script>
</body>

</html>
