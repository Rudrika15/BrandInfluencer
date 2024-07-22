@extends('layouts.app')
@section('title', 'BrandBeans | Profile')
@section('content')
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");
        @import url("https://fonts.googleapis.com/css?family=Bree+Serif&display=swap");

        .profile-header {
            background: #fff;
            width: 100%;
            display: flex;
            height: 190px;
            position: relative;
            box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.2);
        }

        .profile-img {
            float: left;
            width: 340px;
            height: 200px;
        }

        .profile-img img {
            border-radius: 50%;
            height: 230px;
            width: 230px;
            border: 5px solid #fff;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            position: absolute;
            left: 50px;
            top: 20px;
            z-index: 5;
            background: #fff;
        }

        .profilesmall-img {
            /* float: left; */
            width: 100%;
            height: 35px;
        }

        .profilesmall-img img {
            border-radius: 50%;
            height: 40px;
            width: 40px;
            border: 5px solid #fff;
            /* box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2); */
            position: relative;

            background: #fff;
        }

        .profile-nav-info {
            float: left;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-top: 60px;
        }

        .profile-nav-info h3 {
            font-variant: small-caps;
            font-size: 2rem;
            font-family: sans-serif;
            font-weight: bold;
        }

        .profile-nav-info .address {
            display: flex;
            font-weight: bold;
            color: #777;
        }

        .profile-nav-info .address p {
            margin-right: 5px;
        }

        .profile-option {
            width: 40px;
            height: 40px;
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.5s ease-in-out;
            outline: none;
            background: #00c9e4;

        }

        .profile-option:hover {
            background: #fff;
            border: 1px solid #00c9e4;
        }

        .profile-option:hover .notification i {
            color: #00c9e4;
        }

        .profile-option:hover span {
            background: #00c9e4;
        }

        .profile-option .notification i {
            color: #fff;
            font-size: 1.2rem;
            transition: all 0.5s ease-in-out;
        }

        .profile-option .notification .alert-message {
            top: -5px;
            right: -5px;
            height: 20px;
            width: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .main-bd {
            width: 100%;

            display: flex;
            padding-right: 15px;
        }

        .profile-side {
            width: 300px;
            background: #fff;
            box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
            padding: 90px 30px 20px;
            font-family: "Bree Serif", serif;
            margin-left: 10px;
            z-index: 99;
        }

        .profile-side span {
            margin-bottom: 7px;
            color: #333;
            font-size: 14px;
        }

        .profile-side span i {
            color: #03a0b4;
            margin-right: 10px;
        }

        .mobile-no i {
            transform: rotateY(180deg);
            color: #00c9e4;
        }

        .profile-btn {
            display: flex;
        }



        button.chatbtn,
        button.createbtn {

            border: 0;
            padding: 10px 80px 10px 80px;
            width: 100%;
            border-radius: 3px;
            background: #00c9e4;
            color: #fff;
            font-family: "Bree Serif";
            font-size: 1rem;
            margin: 5px 2px;
            cursor: pointer;
            outline: none;
            margin-bottom: 10px;
            transition: background 0.3s ease-in-out;
            box-shadow: 0px 5px 7px 0px rgba(0, 0, 0, 0.3);
        }

        button.chatbtn:hover,
        button.createbtn:hover {
            background: rgba(2, 214, 241, 0.9);
            color: #fff;

        }

        button.chatbtn i,
        button.createbtn i {
            margin-right: 5px;
        }



        /* .rate {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        padding-top: 6px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } */

        /* .rate i {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    font-size: 0.9rem;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    color: rgba(2, 214, 241, 0.9);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                } */

        .nav-b {
            width: 740px;
            z-index: -1;
        }

        .nav-b ul {
            display: flex;
            justify-content: space-around;
            list-style-type: none;
            height: 40px;
            background: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .nav-b ul li {
            padding: 10px;
            width: 100%;
            cursor: pointer;
            text-align: center;
            transition: all 0.2s ease-in-out;
        }

        .nav-b ul li:hover {
            transition: box-shadow 0.5s ease-in-out;
            box-shadow: 0px -3px 0px rgba(100, 100, 100, 0.9) inset;
        }

        .nav-b ul li.active {
            box-shadow: 0px -3px 0px rgba(0, 201, 228, 0.9) inset;
        }

        .profile-body {
            width: 100%;
            z-index: -1;
        }

        .tab {
            display: none;
        }

        .tab {
            padding: 20px;
            width: 100%;
            text-align: center;
        }

        #about-text {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            max-height: 3.6em;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }



        #about-text.expanded {
            overflow: visible;
            white-space: normal;
            text-overflow: initial;
        }

        #see-more-link {
            display: none;
            color: blue;
            cursor: pointer;
        }

        @media (max-width: 1100px) {


            .profile-side {
                width: 250px;
                padding: 90px 15px 20px;
            }

            .profile-img img {
                height: 200px;
                width: 200px;
                left: 50px;
                top: 50px;
            }
        }

        @media (max-width: 900px) {
            body {
                margin: 0 20px;
            }

            .profile-header {
                display: flex;
                height: 100%;
                flex-direction: column;
                text-align: center;
                padding-bottom: 20px;
            }

            .profile-img {
                float: left;
                width: 100%;
                height: 200px;
            }

            .profile-img img {
                position: relative;
                height: 200px;
                width: 200px;
                left: 0px;
            }

            .profile-nav-info {
                text-align: center;
            }

            .profile-option {
                right: 20px;
                top: 75%;
                transform: translateY(50%);
            }

            .main-bd {
                flex-direction: column;
                padding-right: 0;
            }

            .profile-side {
                width: 100%;
                text-align: center;
                padding: 20px;
                margin: 5px 0;
            }

            .profile-nav-info .address {
                justify-content: center;
            }


        }

        @media (max-width: 400px) {
            body {
                margin: ;
            }

            .profile-header h3 {}

            .profile-option {
                width: 30px;
                height: 30px;
                position: absolute;
                right: 15px;
                top: 83%;
            }

            .profile-option .notification .alert-message {
                top: -3px;
                right: -4px;
                padding: 4px;
                height: 15px;
                width: 15px;
                font-size: 0.7rem;
            }

            .profile-nav-info h3 {
                font-size: 1.9rem;
            }

            .profile-nav-info .address p,
            .profile-nav-info .address span {
                font-size: 0.7rem;
            }
        }

        #see-more-bio,
        #see-less-bio {
            color: blue;
            cursor: pointer;
            text-transform: lowercase;
        }

        .tab h1 {
            font-family: "Bree Serif", sans-serif;
            display: flex;
            justify-content: center;
            margin: 20px auto;
        }
    </style>
    <div class="container">
        <input type="hidden" id="authId" name="authId" value="{{ Auth::user()->id }}">

        <div class="pb-2">
            <a href="{{ url()->previous() }}" class="btn btn-light">
                < Back</a>
        </div>
        <div class="profile-header">
            <div class="profile-img">

                @if (isset($profile))
                    <img src="{{ asset('profile') }}/{{ $profile->profilePhoto }}" width="200" alt="Profile Image"
                        style="object-fit: contain;">
                @else
                    <img src="{{ asset('images/defaultPerson.jpg') }}" width="200" alt="Profile Image">
                @endif
            </div>
            <div class="profile-nav-info d-flex justify-content-between">
                <div class="w-100">
                    <h3 class="user-name">{{ $profile->name ?? '' }}</h3>
                    <div class="address">
                        @if (!empty($profile->city))
                            <p id="state" class="state">{{ $profile->city ?? '' }} ,</p>
                        @endif
                        @if (isset($profile->state))
                            <span id="country" class="country"> {{ $profile->state }}.</span>
                        @endif

                        <br>


                    </div>
                    <div class="address">
                        <p id="state" class="state">
                            @if (isset($profile->instagramFollowers))
                                <a href="{{ $profile->instagramUrl }}">
                                    <i class="bi bi-instagram text-danger"></i>
                                    {{ $profile->instagramFollowers }}
                                </a>
                            @endif
                        </p>
                        &nbsp; &nbsp;
                        @if (isset($profile->youtubeSubscriber))
                            <span id="country" class="country">
                                <a href="{{ $profile->youtubeChannelUrl }}">
                                    <i class="bi bi-youtube text-danger"></i>

                                    {{ $profile->youtubeSubscriber }}</span>
                            </a>
                        @endif
                        <br>


                    </div>
                </div>



            </div>
            <div class="profile-option">
                <div class="">
                    @if (Auth::user()->hasRole('Brand'))
                        <div class="me-5">
                            <button type="button" class="btn btn-info text-white px-5 py-2 me-5" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"> Message </button>

                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Send Message to
                            {{ $influencer->profile->name ?? '' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('new.influencer.chat.index') }}" method="post">
                            @csrf
                            <input type="hidden" name="receiverId" value="{{ $influencer->profile->id ?? '' }}">
                            <div class="input-group mb-3">
                                <input type="text" required class="form-control" name="message"
                                    placeholder="Write a message" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-info" type="submit" id="button-addon2">
                                    <i class="bi bi-send"></i> </button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div> --}}
                </div>
            </div>
        </div>
        <div class="main-bd">
            <div class="left-side">
                <div class="profile-side">

                    <div class="">
                        <h3>About</h3>
                        <p class="" id="">
                            {{ $influencer->profile->about ?? '' }}
                        </p>
                        {{-- <a href="javascript:void(0);" id="see-more-link">See more</a> --}}
                    </div>



                </div>

            </div>
            <div class="right-side">

                <div class="nav-b">
                    <ul>
                        <li onclick="tabs(0)" class="user-post active">Gallery</li>
                        <li onclick="tabs(1)" class="user-review">Packages</li>
                        <li onclick="tabs(2)" class="user-reels">Reels</li>
                    </ul>
                </div>

                <div class="profile-body">
                    <div class="profile-Gallery tab">
                        <div class="row">

                            @if (isset($influencer->profile->card))

                                @foreach ($influencer->profile->card->cardPortfolio as $portfolio)
                                    @if ($portfolio->type == 'Photo' && $portfolio->image != null && $portfolio->image != '')
                                        <div class="col-md-4">
                                            <div class="card text-start" style="width: 15rem;">

                                                <style>
                                                    .card-img-top {
                                                        aspect-ratio: 2/2;
                                                    }

                                                    .card-img-top:hover {
                                                        transform: scale(1.1);
                                                        transition: 0.1s ease-in-out;
                                                        margin-top: -10px;
                                                    }
                                                </style>


                                                <a href="{{ asset('cardimage') }}/{{ $portfolio->image }}"
                                                    target="_blank">
                                                    <img src="{{ asset('cardimage') }}/{{ $portfolio->image }}"
                                                        height="200" class="card-img-top p-3 img-thumbnail portImage"
                                                        alt="">

                                                </a>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            @endif

                        </div>


                    </div>
                    <div class="profile-Packages tab">
                        <div class="row">


                            {{-- @if (count($profile->influencerPackage) > 0) --}}

                            {{-- @foreach ($influencer->profile->influencerPackage as $package)
                                <div class="col-md-4 p-2">
                                    <div class="card" style="width: 15rem;">
                                        <div class="card-header">
                                            {{ $package->title }}
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{!! $package->description !!}</p>
                                          </div>
                                    </div>
                                </div>
                            @endforeach --}}

                            {{-- @endif --}}

                        </div>


                    </div>
                    <div class="profile-reel tab">
                        <div class="row">
                            @if (isset($influencer->profile))


                                @if ($influencer->profile->card)

                                    @foreach ($influencer->profile->card->cardPortfolio as $portfolio)
                                        @if ($portfolio->type == 'Video' && $portfolio->image != null && $portfolio->image != '')
                                            <div class="col-md-6">
                                                <div class=" text-start" style="width: 15rem;">

                                                    <style>
                                                        .card-img-top {
                                                            aspect-ratio: 2/2;
                                                        }

                                                        .card-img-top:hover {
                                                            transform: scale(1.1);
                                                            transition: 0.1s ease-in-out;
                                                            margin-top: -10px;
                                                        }
                                                    </style>


                                                    <a href="{{ asset('cardimage') }}/{{ $portfolio->image }}"
                                                        target="_blank">

                                                        @php
                                                            // Extracting the reel ID from the URL stored in the 'image' field
                                                            $reelUrl = $portfolio->image;
                                                            $reelId = basename(parse_url($reelUrl, PHP_URL_PATH));
                                                        @endphp
                                                        <blockquote class="instagram-media"
                                                            data-instgrm-permalink="https://www.instagram.com/reel/{{ $reelId }}/"
                                                            data-instgrm-version="14"
                                                            style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                                                            <div style="padding:16px;">
                                                                <a href="https://www.instagram.com/reel/{{ $reelId }}/"
                                                                    style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px; text-decoration:none;"
                                                                    target="_blank">View on Instagram</a>
                                                            </div>
                                                        </blockquote>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach



                                @endif
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <script async src="//www.instagram.com/embed.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Get the raw mobile number
            var rawMobileNumber = '{{ $influencer->profile->mobileno ?? '' }}';

            // Format the mobile number
            var formattedNumber = formatMobileNumber(rawMobileNumber);
            // Update the content of the span element
            $('.formattedMobileNumber[data-influencer-id="{{ $influencer->id ?? '' }}"]').text(formattedNumber);

            function formatMobileNumber(number) {
                // Assuming the mobile number is 10 digits
                var formattedNumber = number.substr(0, 0) + '********' + number.substr(0, 0);
                return formattedNumber;
            }
            $('#chatBtn').click(function() {
                // Toggle between original and formatted numbers
                var $formattedMobileNumber = $(
                    '.formattedMobileNumber[data-influencer-id="{{ $influencer->id ?? '' }}"]');
                var currentText = $formattedMobileNumber.text();

                var id = $("#authId").val();
                var influencerId = $("#influencerId").val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');


                if (currentText === formattedNumber) {
                    Swal.fire({
                        title: "Do you really want to Contact this influencer?",
                        text: "It might be spent some points from your package for this.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        confirmButtonColor: "#00c9e4",
                        cancelButtonText: "No",
                        cancelButtonColor: "#d33",
                    }).then(function(confirm) {
                        if (confirm.isConfirmed) {
                            // $formattedMobileNumber.text(rawMobileNumber);
                            console.log('id:', id);
                            // Add an AJAX request here
                            $.ajax({
                                url: "{{ route('brand.influencerContactPoint') }}",
                                method: "POST",
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                data: {
                                    id: id,
                                    influencerId: influencerId,
                                },
                                success: function(response) {
                                    // console.log("AJAX response:", response);
                                    alert(response.message);
                                    if (response.message == "Success") {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'You spent points for contacting this influencer',
                                            text: response.message
                                        }).then(function() {
                                            $formattedMobileNumber.text(
                                                rawMobileNumber);
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            // text: response.message
                                            text: "you don't have enough points for contacting this influencer"
                                        }).then(function() {

                                            // console.warn(response);
                                            window.location.href =
                                                '{{ route('brand.pricing') }}';
                                        });
                                    }

                                },
                                error: function(xhr, status, error) {
                                    // Handle the AJAX error here
                                    console.log("AJAX error:", xhr);
                                }
                            });
                        }
                    });
                }

            });
        });
    </script>
    <script>
        $(".nav-b ul li").click(function() {
            $(this)
                .addClass("active")
                .siblings()
                .removeClass("active");
        });

        const tabBtn = document.querySelectorAll(".nav-b ul li");
        const tab = document.querySelectorAll(".tab");

        function tabs(panelIndex) {
            tab.forEach(function(node) {
                node.style.display = "none";
            });
            tab[panelIndex].style.display = "block";
        }
        tabs(0);

        let bio = document.querySelector(".bio");
        const bioMore = document.querySelector("#see-more-bio");
        const bioLength = bio.innerText.length;

        function bioText() {
            bio.oldText = bio.innerText;

            bio.innerText = bio.innerText.substring(0, 100) + "...";
            bio.innerHTML += `<span onclick='addLength()' id='see-more-bio'>See More</span>`;
        }

        bioText();

        let isFullTextVisible = false;

        function addLength() {
            if (isFullTextVisible) {
                bio.innerText = bio.oldText.substring(0, 100) + "...";
                document.getElementById("see-more-bio").innerText = "See More";
                isFullTextVisible = false;
            } else {
                bio.innerText = bio.oldText;
                document.getElementById("see-more-bio").innerText = "See Less";
                isFullTextVisible = true;
            }
        }
        // if (document.querySelector(".alert-message").innerText > 9) {
        //     document.querySelector(".alert-message").style.fontSize = ".7rem";
        // }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const aboutText = document.getElementById('about-text');
            const seeMoreLink = document.getElementById('see-more-link');

            const fullText = aboutText.textContent.trim();
            const words = fullText.split(' ');

            console.log("Full text:", fullText);
            console.log("Number of words:", words.length);

            if (words.length > 50) {
                const truncatedText = words.slice(0, 50).join(' ') + '...';
                aboutText.textContent = truncatedText;
                seeMoreLink.style.display = 'inline'; // Show "See more" link
            }

            seeMoreLink.addEventListener('click', function() {
                aboutText.textContent = fullText;
                aboutText.classList.toggle('expanded'); // Toggle the expanded class
                seeMoreLink.style.display = 'none'; // Hide "See more" link after click
            });
        });
    </script>

@endsection
