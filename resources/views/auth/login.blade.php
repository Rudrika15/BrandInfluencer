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

    <link rel="icon" href="{{ asset('assetshtml/images/fav_icon.png" type="image/x-icon') }}">

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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>



<body>

    @include('extra.homePageMenu')

    <div class="container" style="margin-top: 150px; max-width: 500px; margin-bottom: 100px">

        {{-- <div class="text-info text-center pb-4 fw-bold"><img src="{{ asset('images/logo.png') }}" class="w-25" alt=""></div> --}}
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <div class="row">
                    <div class="col-md-10">
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="col-md-2 text-end">

                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                            <i class="bi bi-eye" id="eyeIcon"></i> <!-- Eye slash icon represents hidden password by default -->
                        </button>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <br>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>

                @if (Route::has('password.request'))
                    <div class="pt-3"><a href="{{ route('password.request') }}" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
                @endif
            </div>
        </form>
        <hr>
        <div class="pt-2  d-flex justify-content-between">
            <a href="{{ route('otp.login') }}" class="a-link"><i class="fa fa-user-plus"></i>Login with OTP</a>
            <a href="{{ route('register') }}" class="a-link"><i class="fa fa-user-plus"></i>Register</a>
        </div>
    </div>



    @include('extra.homePageFooter')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
