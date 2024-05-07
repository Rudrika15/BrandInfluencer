@extends('layouts.app')
@section('title', 'Brand beans | Appliers List')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3 class="line-title">Campaigns</h3>
                    </div>

                </div>
            </div>
        </div>
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
                    @foreach ($appliers as $data)
                        <tr>
                            <td>
                                {{ $data->title }}
                            </td>
                            <td>
                                {{ $data->name }}
                            </td>
                            <td>
                                @if ($data->status == 'Approved')
                                    <p class="text-success">
                                        {{ $data->status }}
                                    </p>
                                @elseif ($data->status == 'On Hold')
                                    <p class="text-warning">
                                        {{ $data->status }}
                                    </p>
                                @elseif ($data->status == 'Rejected')
                                    <p class="text-danger">
                                        {{ $data->status }}
                                    </p>
                                @else
                                    <p class="text-primary">
                                        {{ $data->status }}
                                    </p>
                                @endif
                            </td>

                            <td class="text-light" style="display:flex; justify-content:end; ">
                                @if ($data->status != 'Approved')
                                    <a class="btn btn-outline-success btn-xs" style="margin-left: 8px;" title="Approve" href="{{ route('brand.campaign.influencerApproval') }}/{{ $data->campaignId }}/{{ $data->userId }}" onclick="return confirm('Are you sure?')"><i class="bi bi-check  fa-lg"></i></a>
                                @endif
                                @if ($data->status != 'On Hold')
                                    <a class="btn btn-outline-warning btn-xs" style="margin-left: 8px;" title="On Hold" href="{{ route('brand.campaign.influencerOnHold') }}/{{ $data->campaignId }}/{{ $data->userId }}"><i class="bi bi-pause  fa-lg"></i></a>
                                @endif
                                @if ($data->status != 'Rejected')
                                    <a class="btn btn-outline-danger  btn-xs" style="margin-left: 8px;" title="Reject" href="{{ route('brand.campaign.influencerReject') }}/{{ $data->campaignId }}/{{ $data->userId }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg fa-lg"></i></a>
                                @endif
                                <a class="btn btn-outline-info btn-xs" style="margin-left: 8px;" title="View influencer Detail" href="{{ route('brand.campaign.influencerDetail') }}/{{ $data->campaignId }}/{{ $data->userId }}"><i class="bi bi-info fa-lg"></i></a>
                                {{-- @if ($data->status == 'Approved')
                                    <a class="btn btn-outline-primary btn-xs" title="View Post" style="margin-left: 8px;" href="{{ route('brand.campaign.influencerPortfolio') }}/{{ $data->campaignId }}/{{ $data->userId }}"><i class="bi bi-eye  fa-lg"></i></a>
                                @endif --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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


@endsection
