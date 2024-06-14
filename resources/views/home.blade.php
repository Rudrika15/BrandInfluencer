@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <div class='container'>

        {{-- @if (session('role') === 'influencer') --}}
        @role('Influencer')
            <div class="row">

                @foreach ($brands as $brand)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; height: 22rem">
                            <a href="{{ route('influencer.campaignView') }}/{{ $brand->brand->id }}">

                                <img src="{{ asset('campaignPhoto') }}/{{ $brand->brand->photo }}" onerror="this.src='{{ asset('images/default.jpg') }}'" class="card-img-top" style="height: 250px" alt="...">

                                <div class="card-body">
                                    <h5 class="card-title" style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1;  -webkit-box-orient: vertical;">{{ $brand->brand->title }}</h5>
                                    <p class="card-text" style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">
                                        {{ $brand->brand->detail }} </p>
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
                <div class="card-body p-3">
                    <div class='row'>
                        <div class='col-md-12'>
                            <form id="categoryForm" action="{{ route('home') }}" method="get">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 d-flex gap-3">
                                        <select name="category[]" class="form-select" id="categorySelect" multiple>
                                            <option disabled>Select Categories</option>

                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->name }}" @if (is_array(request('category')) && in_array($cat->name, request('category'))) selected @endif>
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-primary" onchange="document.getElementById('categoryForm').submit();" id="categoryForm">
                                            Search </button>
                                        {{-- <i class="bi bi-bootstrap-arrow"></i> --}}


                                        <a href="{{ route('home') }}" class="mt-1">
                                            <b>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" stroke="currentColor" stroke-width="1" />
                                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" stroke="currentColor" stroke-width="1" />
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
            <div class="row">
                @foreach ($influencer as $influencers)
                    @if ($influencers->profilePhoto != null)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <a href="{{ route('brand.influencerProfile') }}/{{ $influencers->id }}/{{ $influencers->userId }}">

                                    <img src="{{ asset('profile') }}/{{ $influencers->profilePhoto }}" class="card-img-top" style="weight: 150px; height: 300px; object-fit: contain;" onerror="this.src='{{ asset('images/defaultPerson.jpg') }}'" alt="...">

                                    <hr>
                                    <div class="card-body">

                                        <h5 class="card-title">{{ $influencers->name }}</h5>


                                    </div>
                                </a>
                            </div>


                        </div>
                    @endif
                @endforeach
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
