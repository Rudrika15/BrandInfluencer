@extends('layouts.app')
@section('title', 'Brand beans | Campaign Applied List')
@section('content')

    {{-- <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}

    <div class='container'>
        {{-- <div class="card w-100">
            <div class="card-body">
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h3 class="line-title "> Applied Campaigns</h3>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid">

                    <table class="table border" id="data-table">


                        <thead>
                            <tr>
                                <th>Campaign Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($campaignList as $data)
                                <tr>
                                    <td>
                                        {{ $data->campaign->title }}

                                    </td>
                                    @if ($data->status == 'Approved')
                                        <td class="text-success">{{ $data->status }}</td>
                                    @else
                                        <td class="text-primary">{{ $data->status }}</td>
                                    @endif
                                    <td>
                                        @if ($data->status == 'Approved')
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('brand.campaign.appliersCreate') }}/{{ $data->campaign->id }}/{{ $data->userId }}">Details</a>
                                        @endif
                                        @foreach ($data->campaign as $campaign)
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
        <div class="row">
            @if (count($campaignList) > 0)

                @foreach ($campaignList as $brand)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; height: 22rem">
                            <a href="{{ route('influencer.campaignView') }}/{{ $brand->campaign->id }}">

                                <img src="{{ asset('campaignPhoto') }}/{{ $brand->campaign->photo }}"
                                    onerror="this.src='{{ asset('images/default.jpg') }}'" class="card-img-top"
                                    style="height: 250px" alt="...">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $brand->campaign->title }}</h5>
                                    <p class="card-text"
                                        style=" overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">
                                        {{ $brand->campaign->detail }}

                                    </p>


                                </div>
                            </a>
                        </div>

                    </div>
                @endforeach
            @else
                <h5>There Are No Campaigns Applied By You</h5>
            @endif

        </div>
    </div>

    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#data-table');
    </script> --}}
@endsection
