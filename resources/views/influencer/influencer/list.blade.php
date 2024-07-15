@extends('admin.layouts.app')
@section('title', 'Brand beans | Influencer List')
@section('content')
    <div class='container'>
        <div class='row'>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <table id="example" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Mobile Number</th>
                                    <th> Featured</th>
                                    <th> Trending</th>
                                    <th> BrandBeans Verified</th>

                                    <th width="280px"> Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($influencer as $influencers)
                                    <tr>
                                        <td>{{ $influencers->name }}</td>
                                        <td>{{ $influencers->email }}</td>
                                        <td>{{ $influencers->mobileno }}</td>
                                        <td>
                                            @if ($influencers->influencer->is_featured == 'on')
                                                <i class="bi bi-check text-success h2"></i>
                                            @else
                                                <i class="bi bi-x text-danger h2"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($influencers->influencer->is_trending == 'on')
                                                <i class="bi bi-check text-success h2"></i>
                                            @else
                                                <i class="bi bi-x text-danger h2"></i>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($influencers->influencer->is_brandBeansVerified == 'on')
                                                <i class="bi bi-check text-success h2"></i>
                                            @else
                                                <i class="bi bi-x text-danger h2"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('influencer.singleView') }}/{{ $influencers->id }}"
                                                class="btn btn-primary btn-sm">View Details</a>
                                            <a href="{{ route('influencer.statusEdit') }}/{{ $influencers->id }}"
                                                class="btn btn-info btn-sm">Edit</a>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $influencer->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
