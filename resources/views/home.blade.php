@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')



    <div class='container'>

        @if (session('role') === 'influencer')
            <div class="row">

                @foreach ($brands as $brand)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">

                            @if ($brand->brand->photo)
                                <img src="{{ asset('campaignPhoto') }}/{{ $brand->brand->photo }}" class="card-img-top" style="height: 250px" alt="...">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" class="card-img-top" style="height: 250px" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $brand->brand->title }}</h5>
                                <p class="card-text">{{ $brand->brand->detail }}</p>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if (session('role') === 'brand')

            <div class='row'>
                <div class='col-md-12'>
                    <form action="{{ route('home') }}" method="get">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12">
                                <select name="category" class="form-control">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->name }}" @if ($cat->name == request('category')) selected @endif>
                                            {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="my-3">

                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                    <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
                            @if (isset($influencers->profilePhoto))
                                <img src="{{ asset('profile') }}/{{ $influencers->profilePhoto }}" class="card-img-top" style="weight: 150px; height: 300px;" alt="...">
                            @else
                                <img src="{{ asset('images/defaultPerson.jpg') }}" style="weight: 150px; height: 300px" class="card-img-top" alt="...">
                            @endif
                            <hr>
                            <div class="card-body">
                                <a href="{{ route('brand.influencerProfile') }}/{{ $influencers->id }}/{{ $influencers->userId }}">
                                    <h5 class="card-title">{{ $influencers->name }}</h5>
                                </a>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        @endif
    </div>



@endsection
