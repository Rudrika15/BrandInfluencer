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

    {{-- <div id="single-wrapper">
        <div class="w-50">

            <form method="POST" action="{{ route('password.email') }}" class="frm-single">
                @csrf
                <div class="inside">
                    <div class="frm-title">
                        <img src="{{ asset('asset/img/logo.png') }}" alt="" style="height: 25%; width:25%;">
                    </div>
                    <!-- /.title -->
                    <div class="frm-title">Reset password</div>

                    <div class="frm-input" style="width: 90%;">

                        <input id="email" placeholder="Email" type="email"
                            class="frm-inp @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="email"><i class="fa fa-user frm-ico"></i>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="frm-submit">
                                Send Password Reset Link<i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- .inside -->
            </form>
            <!-- /.frm-single -->
        </div>
    </div> --}}

    <div class="container" style="margin-top: 150px; max-width: 500px; margin-bottom: 100px">
        <div class="card ">



            {{-- <div class="text-info text-center pb-4 fw-bold"><img src="{{ asset('images/logo.png') }}" class="w-25" alt=""></div> --}}
            <form method="POST" action="{{ route('password.email') }}" class="frm-single">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Reset password</label>
                    <input id="email" placeholder="Email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" autocomplete="email"><i class="fa fa-user frm-ico"></i>

                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <br>

                <div style="display:  flex;  justify-content: space-between">
                    <button type="submit" class="btn btn-primary">Submit</button>


                </div>
            </form>
            <hr>
            <div class="pt-2" style="display: flex; justify-content: center">
                <a href="{{ route('otp.login') }}" class="a-link"><i class="fa fa-user-plus"></i>Login with OTP</a>
                {{-- <a href="{{ route('register') }}" class="a-link"><i class="fa fa-user-plus"></i>Register</a> --}}
            </div>
        </div>

    </div>

    <!--/#single-wrapper -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="assets/script/html5shiv.min.js"></script>
  <script src="assets/script/respond.min.js"></script>
 <![endif]-->
    <!--
 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{-- <script src="{{ asset('asset/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/modernizr.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/nprogress.js') }}"></script>
    <script src="{{ asset('asset/scripts/waves.min.js') }}"></script>

    <script src="{{ asset('asset/scripts/main.min.js') }}"></script> --}}
    @include('extra.homePageFooter')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</body>

</html>
