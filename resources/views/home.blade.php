@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assetshtml/css/custom.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <div class='container'>

        {{-- @if (session('role') === 'influencer') --}}
        @role('Influencer')
            <div class="card" style="width: 95%">
                <div class="card-header justify-content-center">
                    <h1>Campaigns</h1>
                </div>
            </div>
            <div class="row">

                @foreach ($campaigns as $campaign)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; height: 22rem">

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
                                    <div class="col-md-12">
                                        <label for="trending" class="form-label pe-3">
                                            <input type="radio" name="type" value="is_trending" checked
                                                @if (request('type') == 'is_trending') checked @endif id="trending">
                                            <b>Trending</b>
                                        </label>

                                        <label for="featured" class="form-label pe-3">
                                            <input type="radio" name="type" value="is_featured"
                                                @if (request('type') == 'is_featured') checked @endif id="featured">
                                            <b>Featured</b>
                                        </label>

                                        <label for="brandBeansVerified" class="form-label pe-3">
                                            <input type="radio" name="type" value="is_brandBeansVerified"
                                                @if (request('type') == 'is_brandBeansVerified') checked @endif id="brandBeansVerified">
                                            <b> BrandBeans Verified</b>
                                        </label>
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

            <div class="container influencer_section " style="height: 400px !important;">
                <div class="">
                    <div class="influencer_inner">
                        @foreach ($influencer as $item)
                            {{-- @if ($item->profilePhoto != null) --}}
                            <div class="influencer_item ">
                                @if ($item->influencer->is_trending == 'on')
                                    <span class="influencer_tag">Trending</span>
                                @endif
                                @if ($item->influencer->is_featured == 'on')
                                    <span class="influencer_tag featured mt-4">Featured</span>
                                @endif

                                {{-- <a href="{{ route('brand.influencerProfile') }}/{{ $item->id }}/{{ $item->userId }}"> --}}
                                <div class="influencer_img">
                                    <img class="bg-light" src="{{ asset('profile') }}/{{ $item->profilePhoto ?? '' }}"
                                        onerror="this.src='{{ asset('images/default.jpg') }}'"
                                        style="height: 350px; object-fit: contain;" />
                                </div>
                                {{-- </a> --}}
                                <div class="content">
                                    <p>{{ $item->name }}</p>
                                    <span>{{ $item->instagramFollowers ?? '0' }} Followers</span>
                                    <div class="explore_btn ">
                                        <a href="{{ route('brand.influencerProfile') }}/{{ $item->id }}/{{ $item->userId }}"
                                            class="custombtn highlighbtn">View Profile</a>
                                    </div>
                                </div>

                            </div>
                            {{-- @endif --}}
                        @endforeach
                    </div>
                </div>
            </div>
        @endrole
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categorySelect').select2({
                placeholder: 'Select Categories',
                allowClear: true
            });
        });
    </script>

@endsection
