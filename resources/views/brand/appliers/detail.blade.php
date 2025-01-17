@extends('layouts.app')
@section('title', 'Brand beans | Create Campaign Step')
@section('content')

    <div class='container'>
        <div class="card w-100">
            <div class="card-body">


                <div class='row'>
                    <div class='col-md-12'>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h3 class="line-title">Campaigns</h3>
                            </div>
                            <div class="">

                                <a class="btn btn-sm btn-success"
                                    href="{{ route('brand.campaign.influencerApproval') }}/{{ request('campaignId') }}/{{ $profile->userId }}"
                                    onclick="return confirm('Are you sure?')">Approved</a>
                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('brand.campaign.influencerOnHold') }}/{{ request('campaignId') }}/{{ $profile->userId }}">On
                                    Hold</a>
                                <a class="btn btn-sm btn-danger"
                                    href="{{ route('brand.campaign.influencerReject') }}/{{ request('campaignId') }}/{{ $profile->userId }}"
                                    onclick="return confirm('Are you sure?')">Reject</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3>Personal Details</h3>
                        <div class="row">

                            <div class="col-md-5">
                                @if ($profile->profile->profilePhoto)
                                    <img class="img-thumbnail" style=" height: 150px; width: 150px;"
                                        src="{{ asset('profile') }}/{{ $profile->profile->profilePhoto }}" alt="image">
                                @else
                                    <img class="img-thumbnail" style=" height: 150px; width: 150px;"
                                        src="{{ asset('images/default.jpg') }}" alt="image"><br> <br>
                                @endif
                            </div>
                            <div class="col-md-7">
                                <h5 class="card-title"><b>Email : </b>{{ $profile->profile->email }}</h5>
                                <h6 class="card-subtitle mb-2 "><b>Contact Number : </b>{{ $profile->profile->mobileno }}
                                </h6>
                                @if (isset($profile->category))
                                    <h6 class="card-subtitle mb-2 "><b>Category Name : </b>{{ $profile->category->name }}
                                    </h6>
                                @else
                                    <h6 class="card-subtitle mb-2 "><b>Category Name : </b>-</h6>
                                @endif
                                <h6 class="card-subtitle mb-2 "><b>Address : </b>{{ $profile->address }}</h6>
                                <h6 class="card-subtitle mb-2 "><b>Brand Beans Verified : </b>
                                    @if ($profile->is_brandBeansVerified == 'on')
                                        <i class="menu-icon fa fa-check-circle text-success"></i>
                                    @else
                                        <i class="menu-icon fa fa-close text-danger"></i>
                                    @endif
                                </h6>

                                <h6 class="card-subtitle mb-2 "><b>Trending : </b>
                                    @if ($profile->is_trending == 'on')
                                        <i class="menu-icon fa fa-check-circle text-success"></i>
                                    @else
                                        <i class="menu-icon fa fa-close text-danger"></i>
                                    @endif
                                </h6>

                                <h6 class="card-subtitle mb-2 "><b>Featured : </b>
                                    @if ($profile->is_featured == 'on')
                                        <i class="menu-icon fa fa-check-circle text-success"></i>
                                    @else
                                        <i class="menu-icon fa fa-close text-danger"></i>
                                    @endif
                                </h6>

                                <h6 class="card-subtitle mb-2 "><b>Status : </b>
                                    @if ($profile->status == 'Active')
                                        <span class="text-success">{{ $profile->status }}</span>
                                    @else
                                        <span class="text-danger">{{ $profile->status }}</span>
                                    @endif
                                </h6>
                            </div>
                        </div>
                    </div>

                    <!-- modal -->
                </div>
            </div>
        </div>

        <!-- portfolio of influencer -->

        <div class="card w-100">
            <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; ">
                <div class="">
                    <h4 class="line-title">
                        Portfolio
                    </h4>
                </div>

            </div>
            <div class="card-body">
                <div class="row">

                    @foreach ($portfolio as $data)
                        <div class="col-md-3">
                            <img class="img-thumbnail" style=" height: 200px; width: 200px;"
                                src="{{ asset('portfolioPhoto') }}/{{ $data->photo }}" alt="image">

                        </div>
                    @endforeach

                </div>

            </div>
        </div>

    </div>



@endsection
