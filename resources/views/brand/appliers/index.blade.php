@extends('layouts.app')
@section('title', 'Brand beans | Appliers List')
@section('content')
    <div class='container'>
        <div class="card w-100">
            <div class="card-body">
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h3 class="line-title">Campaign Appliers</h3>
                            </div>

                        </div>
                    </div>
                </div>
                @if ($campaign->appliedInfluencer->isNotEmpty())
                    <div class="container-fluid ">
                        <table id="" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th> Campaign Name</th>
                                    <th> Applier</th>
                                    <th> Status</th>
                                    <th style="width: 10px;"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campaign->appliedInfluencer as $data)
                                    <tr>
                                        <td>{{ $campaign->title ?? '-' }}</td>
                                        <td>{{ $data->user->username ?? '-' }}</td>
                                        <td>
                                            @if ($data->status == 'Approved')
                                                <p class="text-success">{{ $data->status }}</p>
                                            @elseif ($data->status == 'On Hold')
                                                <p class="text-warning">{{ $data->status }}</p>
                                            @elseif ($data->status == 'Rejected')
                                                <p class="text-danger">{{ $data->status }}</p>
                                            @else
                                                <p class="text-primary">{{ $data->status }}</p>
                                            @endif
                                        </td>

                                        <td class="text-light" style="display:flex; justify-content:end;">
                                            {{-- Approve Button --}}
                                            @if ($data->status != 'Approved')
                                                <button class="btn btn-outline-success btn-xs approveBtn"
                                                    data-campaign-id="{{ $data->campaignId }}"
                                                    data-user-id="{{ $data->userId }}" style="margin-left: 8px;"
                                                    title="Approve">
                                                    <i class="bi bi-check fa-lg"></i>
                                                </button>
                                            @endif

                                            {{-- On Hold --}}
                                            @if ($data->status != 'On Hold')
                                                <a class="btn btn-outline-warning btn-xs" style="margin-left: 8px;"
                                                    title="On Hold"
                                                    href="{{ route('brand.campaign.influencerOnHold', [$data->campaignId, $data->userId]) }}">
                                                    <i class="bi bi-pause fa-lg"></i>
                                                </a>
                                            @endif

                                            {{-- Reject --}}
                                            @if ($data->status != 'Rejected')
                                                <a class="btn btn-outline-danger btn-xs" style="margin-left: 8px;"
                                                    title="Reject"
                                                    href="{{ route('brand.campaign.influencerReject', [$data->campaignId, $data->userId]) }}"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-x-lg fa-lg"></i>
                                                </a>
                                            @endif

                                            {{-- Influencer Detail --}}
                                            <a class="btn btn-outline-info btn-xs" style="margin-left: 8px;"
                                                title="View influencer Detail"
                                                href="{{ route('brand.campaign.influencerDetail', [$data->campaignId, $data->userId]) }}">
                                                <i class="bi bi-info fa-lg"></i>
                                            </a>

                                            {{-- Campaign Appliers Content --}}
                                            {{-- @if (!empty($data->activity_step_id)) --}}
                                            <a class="btn btn-outline-primary btn-xs" style="margin-left: 8px;"
                                                title="View Appliers Content"
                                                href="{{ route('brand.campaign.content', $data->id) }}">
                                                <i class="bi bi-file-earmark-text fa-lg"></i>
                                            </a>
                                            {{-- @endif --}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @else
                    <h4 class="text-center mt-5">There are no applications</h4>
                @endif
            </div>
        </div>
    </div>


    <script>
        function readURL(input, tgt) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector(tgt).setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.approveBtn', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Approve this applicant?',
                text: "The status will change to Approved!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, approve!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/brand-campaign-applier-content-approval/' + id,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Approved!',
                                    text: response.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                // Update the status badge
                                $('#status-' + id).html(
                                    '<span class="badge bg-success">Approved</span>');

                                //Update the action buttons
                                $('#action-' + id).html(
                                    '<span class="text-success">Approved</span>');
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    </script>



@endsection
