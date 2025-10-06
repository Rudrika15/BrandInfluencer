@extends('admin.layouts.app')
@section('title', 'Brand beans | Influencer List')
@section('content')


    @if ($message = Session::get('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100;">
            <div class="toast align-items-center text-bg-success border-0 shadow" id="successToast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body fw-semibold">
                        {{ $message }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var toastEl = document.getElementById('successToast');
                var toast = new bootstrap.Toast(toastEl, {
                    delay: 3000
                });
                toast.show();
            });
        </script>
    @endif



    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Influencer List</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('influencer.export') }}" class="btn btn-success">Export</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Form -->
        <!-- Search Form -->
        <div class="row mb-3">
            <div class="col-md-6">
                <form method="GET" action="{{ route('influencer.list') }}" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search by Name, Email or Mobile" value="{{ request('search') }}">
                    <button class="btn btn-primary me-2" type="submit">Search</button>
                    <a href="{{ route('influencer.list') }}" class="btn btn-secondary">Reset</a>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <table id="example" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Featured</th>
                                    <th>Trending</th>
                                    <th>BrandBeans Verified</th>
                                    <th width="280px">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($influencer as $influencerData)
                                    <tr>
                                        <td>{{ $influencerData->name }}</td>
                                        <td>{{ $influencerData->email }}</td>
                                        <td>{{ $influencerData->mobileno }}</td>
                                        <td>
                                            @if ($influencerData->influencer->is_featured == 'on')
                                                <i class="bi bi-check text-success h2"></i>
                                            @else
                                                <i class="bi bi-x text-danger h2"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($influencerData->influencer->is_trending == 'on')
                                                <i class="bi bi-check text-success h2"></i>
                                            @else
                                                <i class="bi bi-x text-danger h2"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($influencerData->influencer->is_brandBeansVerified == 'on')
                                                <i class="bi bi-check text-success h2"></i>
                                            @else
                                                <i class="bi bi-x text-danger h2"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('influencer.singleView', $influencerData->id) }}" class="btn btn-primary btn-sm">View Details</a>
                                            <a href="{{ route('influencer.statusEdit', $influencerData->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end mt-3">
                            {{ $influencer->appends(['search' => request('search')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
