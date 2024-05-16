@extends('layouts.app')
@section('title', 'Brand beans | Campaign Applied List')
@section('content')

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <div class='container'>
        <div class="card w-100">
            <div class="card-body">
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h3 class="line-title ">Campaign Applied</h3>
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
                                        @foreach ($data->campaign as $campaign)
                                            {{ $campaign->title }}
                                        @endforeach
                                    </td>
                                    @if ($data->status == 'Approved')
                                        <td class="text-success">{{ $data->status }}</td>
                                    @else
                                        <td class="text-primary">{{ $data->status }}</td>
                                    @endif
                                    <td>
                                        @foreach ($data->campaign as $campaign)
                                            @if ($data->status == 'Approved')
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('brand.campaign.appliersCreate') }}/{{ $campaign->id }}/{{ $data->userId }}">Details</a>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#data-table');
    </script>
@endsection
