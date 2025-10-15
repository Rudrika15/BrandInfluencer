@extends('admin.layouts.app')
@section('title', 'Brand beans | Brand Category')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3> Brand Campaign List</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Created By</th>
                                        <th>Title</th>
                                        <th>Campaign Type</th>
                                        <th>Total Appliers</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campaigns as $data)
                                        <tr>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->campaignType }}</td>
                                            <td>
                                                <b>Total:</b> {{ count($data->AppliedInfluencer) }}
                                                <br>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-info mt-1" data-bs-toggle="modal" data-bs-target="#appliersModal{{ $data->id }}">
                                                    View Appliers
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="appliersModal{{ $data->id }}" tabindex="-1" aria-labelledby="appliersModalLabel{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="appliersModalLabel{{ $data->id }}">
                                                                    Appliers List - {{ $data->title }}
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @if (count($data->AppliedInfluencer) > 0)
                                                                    <ul class="list-group">
                                                                        @foreach ($data->AppliedInfluencer as $user)
                                                                            <li class="list-group-item">
                                                                                {{ $user->user->name ?? 'No Name' }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @else
                                                                    <p>No appliers yet.</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('campaignPhoto/' . $data->photo) }}" alt="main image" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $campaigns->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Make sure Bootstrap 5 JS is included -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
