@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assetshtml/css/custom.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        @media (max-width: 1025px) and (min-width: 992px) {
            .col-lg-4 {
                width: 50%;
            }
        }

        @media (max-width : 769px) {
            .camp {
                width: 100% !important;
            }
        }

        @media (max-width : 426px) {
            .camp {
                margin-left: 20px;
                width: 100% !important;
            }

            .detail {
                margin-left: 43px;
            }
        }

        @media (max-width : 376px) {
            .detail {
                margin-left: 25px;
            }
        }

        @media (max-width : 376px) {
            .camp {
                margin-left: 25px;
            }

            .detail {
                margin-left: 25px;
                width: 95% !important;
            }
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categorySelect').select2({
                placeholder: 'Select Categories',
                allowClear: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Check if any checkbox except 'Trending' is checked on page load
            var anyChecked = false;
            $('input[type="checkbox"]').not('#trending').each(function() {
                if ($(this).prop('checked')) {
                    anyChecked = true;
                    return false; // Exit the loop early if found checked checkbox
                }
            });

            // If no other checkbox is checked, ensure 'Trending' remains checked
            // if (!anyChecked) {
            //     $('#trending').prop('checked', true);
            // }

            // When any checkbox is clicked
            $('input[type="checkbox"]').click(function() {
                if ($(this).prop('checked')) {
                    // Uncheck all checkboxes except the one clicked
                    $('input[type="checkbox"]').not(this).prop('checked', false);
                } else {
                    // If a checkbox is unchecked, ensure 'Trending' remains checked if no other checkbox is checked
                    var anyOtherChecked = false;
                    $('input[type="checkbox"]').not('#trending').each(function() {
                        if ($(this).prop('checked')) {
                            anyOtherChecked = true;
                            return false; // Exit the loop early if found checked checkbox
                        }
                    });

                    if (!anyOtherChecked) {
                        $('#trending').prop('checked', true);
                    }
                }
            });
        });
    </script>

    <div class='container'>

        {{-- @if (session('role') === 'influencer') --}}
        @role('Influencer')
            <div class="card camp" style="width: 95%">
                <div class="card-body bg-light">
                    <div class="row">
                        <h1 class="text-center">Campaigns</h1>
                    </div>
                    <div class="row d-flex  justify-content-center mt-2 mb-2">
                        <input type="text" class="form-control  " style="width: 90%" id="search" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="row" id="container">

                @foreach ($campaigns as $campaign)
                    <div class="col-md-6 col-sm-2 col-lg-4">
                        <div class="card detail" style="width: 18rem; height: 22rem">

                            <a href="{{ route('influencer.campaignView') }}/{{ $campaign->id }}">

                                <img src="{{ asset('campaignPhoto') }}/{{ $campaign->photo }}"
                                    onerror="this.src='{{ asset('images/default.jpg') }}'" class="card-img-top"
                                    style="height: 250px" alt="...">

                                <div class="card-body">
                                    <h5 class="card-title"
                                        style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1;  -webkit-box-orient: vertical;">
                                        {{ $campaign->title }}</h5>
                                    <p class="card-text"
                                        style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">
                                        {{ $campaign->detail }} </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endrole


        {{-- @if (session('role') === 'brand') --}}
        @role('Brand')
            <div class="card" style="width: 95%">
                <div class="card-header justify-content-center">
                    <h1> Influencers</h1>
                </div>
                <div class="card-body p-3">
                    <div class='row'>
                        <div class='col-md-12'>
                            <form id="categoryForm" action="{{ route('home') }}" method="get">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 d-flex gap-5 ">
                                        <div class="form-check  form-switch">
                                            <label for="trending" class="form-label pe-3">
                                                <input type="checkbox" class="form-check-input" name="type"
                                                    value="is_trending" @if (request('type') == 'is_trending') checked @endif
                                                    id="trending">
                                                <b>Trending</b>
                                            </label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <label for="featured" class="form-label pe-3">
                                                <input type="checkbox" class="form-check-input" name="type"
                                                    value="is_featured" @if (request('type') == 'is_featured') checked @endif
                                                    id="featured">
                                                <b>Featured</b>
                                            </label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <label for="brandBeansVerified" class="form-label pe-3">
                                                <input type="checkbox" class="form-check-input" name="type"
                                                    value="is_brandBeansVerified"
                                                    @if (request('type') == 'is_brandBeansVerified') checked @endif id="brandBeansVerified">
                                                <b> BrandBeans Verified</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex gap-3">
                                        <select name="category[]" class="form-select" id="categorySelect" multiple>
                                            <option disabled>Select Categories</option>

                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}"
                                                    @if (is_array(request('category')) && in_array($cat->id, request('category'))) selected @endif>
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-primary" type="submit">Search</button>

                                        <a href="{{ route('home') }}" class="mt-1">
                                            <b>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"
                                                        stroke="currentColor" stroke-width="1" />
                                                    <path
                                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"
                                                        stroke="currentColor" stroke-width="1" />
                                                </svg>
                                            </b>
                                        </a>
                                    </div>

                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
            <style>
                .infludiv:hover {
                    box-shadow: 0 0 30px rgba(0, 0, 0, 0.8);
                }
            </style>

            {{-- <div class="row">
                @foreach ($influencer as $influencers)
                    @if ($influencers->profilePhoto != null)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <a
                                    href="{{ route('brand.influencerProfile') }}/{{ $influencers->id }}/{{ $influencers->userId }}">

                                    <img src="{{ asset('profile') }}/{{ $influencers->profilePhoto }}" class="card-img-top"
                                        style="weight: 150px; height: 300px; object-fit: contain;"
                                        onerror="this.src='{{ asset('images/defaultPerson.jpg') }}'" alt="...">

                                    <hr>
                                    <div class="card-body">

                                        <h5 class="card-title">{{ $influencers->name }}</h5>


                                    </div>
                                </a>
                            </div>


                        </div>
                    @endif
                @endforeach
            </div> --}}

            <div class="container  influencer_section">

                <div class="influencer_inner me-5 pe-3">
                    @foreach ($influencer as $item)
                        @if ($item->profilePhoto != null)
                            <div class="influencer_item ">
                                @if ($item->influencer->is_trending == 'on')
                                    <span class="influencer_tag">Trending</span>
                                @endif
                                @if ($item->influencer->is_featured == 'on')
                                    <span class="influencer_tag featured mt-4">Featured</span>
                                @endif
                                @if ($item->influencer->is_brandBeansVerified == 'on')
                                    <i class="bi bi-patch-check-fill heart_icon " style="color: #15c6eb; "></i>
                                @endif

                                {{-- <a href="{{ route('brand.influencerProfile') }}/{{ $item->id }}/{{ $item->userId }}"> --}}

                                <div class="influencer_img">
                                    <picture>
                                        <source type="image/webp"
                                            src="{{ asset('profile') }}/{{ $item->profilePhoto ? str_replace('.jpg', '.webp', $item->profilePhoto) : '' }}">
                                        <source type="image/webp"
                                            src="{{ asset('profile') }}/{{ $item->profilePhoto ? str_replace('.png', '.webp', $item->profilePhoto) : '' }}">

                                        <img class="bg-light lazy" loading="lazy"
                                            data-src="{{ asset('profile') }}/{{ $item->profilePhoto ?? '' }}"
                                            onerror="this.src='{{ asset('images/default.jpg') }}'"
                                            style="height: 350px; object-fit: contain;" alt="Profile Photo" />
                                    </picture>

                                </div>


                                {{-- </a> --}}
                                <div class="content">
                                    <p>{{ $item->name }}</p>
                                    <span>{{ $item->Influencer->instagramFollowers ?? '0' }} Followers</span>
                                    <div class="explore_btn ">
                                        <a href="{{ route('brand.influencerProfile') }}/{{ $item->id }}/{{ $item->userId }}"
                                            class="custombtn highlighbtn">View Profile</a>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>

            </div>


        @endrole
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = document.querySelectorAll('.lazy');

            if ("IntersectionObserver" in window) {
                const imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            const image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.remove('lazy');
                            imageObserver.unobserve(image);
                        }
                    });
                }, {
                    rootMargin: '0px 0px 50px 0px',
                    threshold: 0
                });

                lazyImages.forEach(function(image) {
                    imageObserver.observe(image);
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var timeout = null;

            $('#search').on('keyup', function() {
                var searchTerm = $(this).val();

                clearTimeout(timeout); // Clear the previous timeout

                timeout = setTimeout(function() {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('search') }}',
                        data: {
                            search: searchTerm
                        },
                        success: function(data) {
                            $('#container').html('');
                            $.each(data, function(index, campaign) {
                                var html =
                                    '<div class="col-md-6 col-sm-12 col-lg-4">';
                                html +=
                                    '<div class="card detail" style="width: 18rem; height: 22rem">';
                                html +=
                                    '<a href="{{ route('influencer.campaignView') }}/' +
                                    campaign.id + '">';
                                html +=
                                    '<img src="{{ asset('campaignPhoto') }}/' +
                                    campaign.photo +
                                    '" onerror="this.src=\'{{ asset('images/default.jpg') }}\'" class="card-img-top" style="height: 250px" alt="...">';
                                html += '<div class="card-body">';
                                html +=
                                    '<h5 class="card-title" style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1;  -webkit-box-orient: vertical;">' +
                                    campaign.title + '</h5>';
                                html +=
                                    '<p class="card-text" style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">' +
                                    campaign.detail + '</p>';
                                html += '</div>';
                                html += '</a>';
                                html += '</div>';
                                html += '</div>';
                                $('#container').append(html);
                            });
                        }
                    });
                }, 500); // Delay for 2 seconds
            });

            // Trigger an initial search to load all records on page load
            $('#search').trigger('keyup');
        });
    </script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

@endsection
