@extends('layouts.app')
@section('title', 'Brand beans | Brand Campaign')
@section('content')

    <style>
        .btn.btn-danger:hover {
            color: white !important;
        }
    </style>

    <div class='container'>
        <div class="card w-100">
            <div class="card-body">
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h3 class="line-title">Influencer Package</h3>
                            </div>
                            <div class="p-2">
                                <a href="{{ route('influencer.package.create') }}" class="btn btn-primary">Add</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $data)
                                <tr>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{!! $data->description !!}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('influencer.package.edit', $data->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm delete-btn" data-id="{{ $data->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- ✅ SweetAlert Script --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Confirm delete
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                let id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('influencer.package.delete', '') }}/" + id;
                    }
                });
            });
        });
    </script>

@endsection
