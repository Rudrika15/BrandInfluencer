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
    {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/influencer.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- 
    <!-- toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> 
    --}}


    {{-- new  --}}

    {{-- <link rel="icon" href="{{ asset('assetshtml/images/fav_icon.png" type="image/x-icon') }}"> --}}

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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>



<body>

    @include('extra.homePageMenu')

    <div class="container" style="margin-top: 100px; max-width: 500px; margin-bottom: 100px">
        <div class="card">
            <div class="border p-5">
                {{-- <div class="text-info text-center pb-2 fw-bold">Brand beans</div> --}}
                <form action="{{ route('otp.generate') }}" method="post">
                    @csrf
                    <div class="my-3" style="margin-bottom: 10px">
                        <label for="mobileno" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" value="{{ old('mobileno') }}" id="mobileno"
                            name="mobileno" required autocomplete="mobileno" autofocus
                            placeholder="Enter Your Registered Mobile Number"><i class="fa fa-phone frm-ico"></i>
                        @error('mobileno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary btn-sm mx-2">
                            {{ __('Generate OTP') }}
                        </button> <br> <br>
                        <a class="mx-2" href="{{ route('login') }}" style="margin-top: 55px !important">
                            {{ __('Login with password') }}
                        </a>
                    </div>


            </div>
            </form>
        </div>
    </div>

    </div>




    @include('extra.homePageFooter')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


</body>

</html>
