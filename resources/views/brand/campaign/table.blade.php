@if (count($campaign) > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($campaign->where('startDate', '>', \Carbon\Carbon::now()) as $data)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem; height: 35rem;">
                            <img src="{{ asset('campaignPhoto') }}/{{ $data->photo }}"
                                onerror="this.src='{{ asset('images/default.jpg') }}'" class="card-img-top"
                                alt="Campaign Image" height="260px">

                            <div class="card-body">
                                <h5 class="card-title">{{ $data->title }}</h5>
                                <p class="card-text"
                                    style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">
                                    {{ $data->detail }}
                                </p>
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
                                <div>
                                    <p class="card-text"><strong>Maximum Application:</strong>
                                        {{ $data->maxApplication }}</p>
                                </div>

                                <div class="text-center mb-3 d-flex justify-content-center"
                                    style="position: absolute; bottom: 0%;">
                                    <a href="{{ route('brand.campaign.edit', $data->id) }}"
                                        class="btn btn-success btn-sm me-2">Edit</a>
                                    {{-- <a href="{{ route('brand.campaign.delete', $data->id) }}"
                                        class="btn btn-danger btn-sm me-2">Delete</a> --}}
                                    <a href="{{ route('brand.campaign.delete', $data->id) }}"
                                        class="btn btn-danger btn-sm me-2 delete-btn"
                                        data-id="{{ $data->id }}">Delete</a>

                                    <a href="{{ route('brand.campaign.appliers', $data->id) }}"
                                        class="btn btn-info btn-sm me-2">Appliers</a>
                                    <a href="{{ route('brand.campaignStep.index', $data->id) }}"
                                        class="btn btn-warning btn-sm">Steps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
<div class="col-md-4">


    @if(!empty($influencer) && count($influencer) > 0)
      <h3 style="border-bottom: 1px solid gray; padding-bottom: 5px;">
        Top Most Related Influencers
    </h3>
        <div class="row">
            @foreach($influencer as $influencerData)
                <div class="col-md-12 mb-3">
                    <a href="{{ route('brand.influencerProfile', ['influencerId' => $influencerData->id, 'brandId' => Auth::id()]) }}"
                       class="text-decoration-none text-dark">
                        <div class="card shadow-sm">
                            <div class="text-center p-3">
                                <img
                                    src="{{ asset('profile/' . $influencerData->profilePhoto) }}"
                                    alt="Influencer Photo"
                                    width="200"
                                    style="border: 1px solid #ddd; border-radius: 20%;"
                                    onerror="this.src='{{ asset('images/defaultPerson.jpg') }}'">
                            </div>
                            <div class="card-body text-center">
                                <p class="fw-bold mb-0">
                                    <span>@</span>{{ $influencerData->username }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-start">
            <p class="mb-4">
                If you want to find the top most related influencers for your campaign,
                please update your profile and select your brand category.
            </p>
            <span class="text-muted">No Influencers Found</span>
        </div>
    @endif
</div>





    </div>
@else
    <div class="text-center" style="margin-top: 200px;">
        <span class="text-muted " style="font-weight: 500; font-size: 20px;">No Campaign Found</span>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // stop link from redirecting

                const url = this.getAttribute('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This campaign will be permanently deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url; // proceed with deletion
                    }
                });
            });
        });
    });
</script>




