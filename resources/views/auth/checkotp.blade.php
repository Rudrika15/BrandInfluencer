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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>



<body>

    @include('extra.homePageMenu')

    <div class="container" style="margin-top: 150px; max-width: 500px; margin-bottom: 100px">
        <div class="card ">



            {{-- <div class="text-info text-center pb-4 fw-bold"><img src="{{ asset('images/logo.png') }}" class="w-25" alt=""></div> --}}
            <div class="d-flex justify-content-center pt-5" id="wrapper">
                <!-- Sidebar-->
                <div class="border p-5">
                    {{-- <div class="text-info text-center pb-2 fw-bold">Brand beans</div> --}}
                    <form action="{{ route('auth.loginotp') }}" method="post">
                        @csrf

                        <div class="mx-2">

                            <div class="mb-2">
                                <label class="form-label">Check Otp</label>
                                <input type="text" class="form-control" value="{{ old('otp') }}" id="otp"
                                    name="otp" required autocomplete="otp" autofocus placeholder="Enter OTP here"><i
                                    class="fa fa-phone frm-ico"></i>
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div class="mx-2">
                                <button type="submit" class="btn btn-primary btn-sm mx-2">
                                    {{ __('Login') }}
                                </button>
                                <br><br>
                                <a class="mx-2" href="{{ route('login') }}">
                                    {{ __('Login With Email') }}
                                </a>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>




    @include('extra.homePageFooter')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


</body>

</html>
