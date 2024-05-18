@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')



    <div class='container'>
      
        {{-- @if (session('role') === 'influencer') --}}
        @role('Influencer')
            <div class="row">

                @foreach ($brands as $brand)
                    <div class="col-md-4">
                        <a href="{{ route('influencer.campaignView') }}/{{ $brand->brand->id }}">
                            <div class="card" style="width: 18rem;">

                                <img src="{{ asset('campaignPhoto') }}/{{ $brand->brand->photo }}" onerror="this.src='{{ asset('images/default.jpg') }}'" class="card-img-top" style="height: 250px" alt="...">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $brand->brand->title }}</h5>
                                    <p class="card-text">{{ $brand->brand->detail }}</p>


                                </div>
                            </div>
                        </a>
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
                                        <select name="category" class="form-select" onchange="document.getElementById('categoryForm').submit();">
                                            <option selected disabled>Select Category</option>

                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->name }}" @if ($cat->name == request('category')) selected @endif>
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <a href="{{ route('home') }}" class="mt-2">
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
                @endforeach
            </div>

        @endrole
    </div>



@endsection
