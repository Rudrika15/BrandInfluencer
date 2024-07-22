@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')
    <link rel="stylesheet" href="{{ asset('assetshtml/css/custom.css') }}" />


    <div class="container">
        <div class="card camp" style="width: 95%">
            <div class="card-body bg-light">
                <div class="row">
                    <h1 class="text-center">Featured Brands</h1>
                </div>
                <div class="row d-flex  justify-content-center mt-2 mb-2">
                    <input type="text" class="form-control  " style="width: 90%" id="search" placeholder="Search">
                </div>
            </div>
        </div>
        <div class="row" id="container">

            @foreach ($brands as $campaign)
                <div class="col-md-6 col-sm-2 col-lg-4">
                    <div class="card detail" style="width: 18rem; height: 22rem">

                        <a href="{{ route('brands.profileView') }}/{{ $campaign->id }}">

                            <img src="{{ asset('profile/' . $campaign->profilePhoto) }}"
                                onerror="this.src='{{ asset('images/default.jpg') }}'" class="card-img-top"
                                style="height: 250px" alt="...">

                            <div class="card-body">
                                <h5 class="card-title"
                                    style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1;  -webkit-box-orient: vertical;">
                                    {{ $campaign->name }}</h5>
                                <p class="card-text"
                                    style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">
                                    {{ $campaign->detail }} </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-end">{{ $brands->links() }}</div>


        </div>
    </div>
@endsection
