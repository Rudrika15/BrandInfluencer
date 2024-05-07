@if (count($campaign) > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($campaign as $data)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            @if (isset($data->photo))
                                <img src="{{ asset('campaignPhoto') }}/{{ $data->photo }}" class="card-img-top" alt="Campaign Image">
                            @else
                                <img src="{{ asset('asset/img/defaultCover.jpg') }}" class="card-img-top" alt="Default Campaign Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $data->title }}</h5>
                                <p class="card-text">{{ $data->detail }}</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text"><strong>Price:</strong> {{ $data->price }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text"><strong>Start Date:</strong> {{ $data->startDate }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text"><strong>End Date:</strong> {{ $data->endDate }}</p>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="{{ route('brand.campaign.edit', $data->id) }}" class="btn btn-success btn-sm me-2">Edit</a>
                                    <a href="{{ route('brand.campaign.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        <div class="col-md-4">
            <h3 style="border-bottom: 1px solid gray; padding-bottom: 5px">
                Top Most related Influencer
            </h3>
            @if (isset($influencer))
                <div class="col-md-12">
                    @foreach ($influencer as $influencerData)
                        <a href="{{ route('brand.influencerProfile') }}/{{ $influencerData->id }}/{{ Auth::user()->id }}">

                            <div class="card">
                                <div class="text-center">
                                    @if (isset($influencerData->profilePhoto))
                                        <img src="{{ asset('profile') }}/{{ $influencerData->profilePhoto }}" style="border: 1px solid white; border-radius: 20%" width="200px" alt="image">
                                    @else
                                        <img src="{{ asset('images/defaultPerson.jpg') }}" class="img-thumbnail" style="border: 1px solid white; border-radius: 20%" width="200px" alt="image">
                                    @endif
                                </div>
                                <div class="card-body text-dark">
                                    {{-- <h3 class="card-title">{{ $influencerData->name }}</h3> --}}
                                    <p class="card-text fw-bold"><span>@</span>{{ $influencerData->username }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach


                </div>
            @else
                <div class="text-center">
                    <div style="margin-bottom: 50px;">
                        <p>[If you want find top most related influencer for your campaign please
                            update your profile and select your brand category]</p>
                    </div>

                    <span class="text-muted ">
                        No Influencer Found
                    </span>
                </div>
            @endif
        </div>


    </div>
@else
    <div class="text-center" style="margin-top: 200px;">
        <span class="text-muted " style="font-weight: 500; font-size: 20px;">No Campaign Found</span>
    </div>
@endif
