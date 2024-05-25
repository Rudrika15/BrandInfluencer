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
    <style>
        .radio-pill {
            display: block;
            padding: 10px 20px;
            border-radius: 25px;
            border: 1px solid #1d4880;
            cursor: pointer;
            width: 100%
        }

        .radio-pill.selected {
            background-color: #1d4880;
            color: white;
        }

        .radio-pill-container {
            text-align: center;
            /* Center align the pills */
            display: flex;
            gap: 15px;

        }
    </style>
</head>



<body onload="loadSelectedOption()">

    @include('extra.homePageMenu')

    <div class="container" style="margin-top: 150px; max-width: 500px; margin-bottom: 100px">
        <div class="card ">



            {{-- <div class="text-info text-center pb-4 fw-bold"><img src="{{ asset('images/logo.png') }}" class="w-25" alt=""></div> --}}
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div>
                    <h4 class="text-center" style="margin-bottom: 5%">Register as a </h4>
                    <div class="radio-pill-container">
                        <input type="hidden" id="session" name="session" value="">
                        <div id="brand" class="radio-pill" onclick="selectOption('brand')">Brand
                        </div>
                        {{-- <input type="text" name="session" value=""> --}}
                        <div id="influencer" class="radio-pill" onclick="selectOption('influencer')">
                            Influencer </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input class="form-control" style="margin-top: 5%" type="name" placeholder="Name"
                        value="{{ old('name') }}" id="name" name="name">
                    @error('name')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <br>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" value="{{ old('email') }}"
                        id="email" name="email">
                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Create Your Unique Username"
                        value="{{ old('username') }}" id="username" name="username">
                    @error('username')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>
                <?php
                    session_start();
                    if (isset($_SESSION['mobileno'])) {
                        $mobileno = $_SESSION['mobileno'];
                    ?>

                <div class="mb-3"><input type="text" class="form-control" placeholder="Enter your Phone number"
                        readonly value="{{ $mobileno }}" id="mobileno" name="mobileno">
                    @error('mobileno')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>
                <?php
                    } else {
                        $mobileno = "";
                    ?>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Enter your Phone number"
                        value="{{ $mobileno }}" id="mobileno" name="mobileno">
                    @error('mobileno')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>
                <?php
                    }
                    ?>

                <div class="mb-3"><input type="password" class="form-control" placeholder="Password" name="password">
                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>
                <div class="mb-3"><input type="password" class="form-control" placeholder="Confirm Password"
                        class="" id="password_confirmation" name="confirm-password"></div>

                <br>


                {{-- <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Do you have Refer Code??" class="" id="refer" name="refer">
                </div> --}}



                <button type="submit" class="btn btn-primary">Register </button>


            </form>
            <hr>
            <div class="pt-2" style="display: flex; justify-content: space-between">
                <a href="{{ route('otp.login') }}" class="a-link"><i class="fa fa-user-plus"></i>Login with OTP</a>
                <a href="{{ route('login') }}" class="a-link"><i class="fa fa-user-plus"></i>Login</a>
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

    <script>
        // Function to handle the selection
        function selectOption(option) {
            // Remove selected class from both pills
            document.getElementById('brand').classList.remove('selected');
            document.getElementById('influencer').classList.remove('selected');

            // Add selected class to the clicked pill
            document.getElementById(option).classList.add('selected');

            // Save the selected option to local storage
            localStorage.setItem('selectedOption', option);
            console.log(localStorage);
            // document.getElementById('selectedRole').value = option;
            document.getElementById('session').value = option;

        }


        // Function to load the selected option from local storage
        function loadSelectedOption() {
            const selectedOption = localStorage.getItem('selectedOption');
            if (selectedOption) {
                document.getElementById(selectedOption).classList.add('selected');
                document.getElementById('session').value = selectedOption;
            }
        }

        // Load the selected option when the page is loaded
        document.addEventListener('DOMContentLoaded', loadSelectedOption);
    </script>

</body>

</html>
