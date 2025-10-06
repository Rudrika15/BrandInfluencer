@extends('admin.layouts.app')
@section('title', 'Brand beans | Packages')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Packages</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('admin.brand.package.create') }}" class="btn btn-primary btn-sm">Add Packages</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Points</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brandPackage as $data)
                                        <tr>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->price }}</td>
                                            <td>{{ $data->points }}</td>
                                            <td>
                                                <a href="{{ route('admin.brand.package.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                                <form action="{{ route('admin.brand.package.delete', $data->id) }}" method="GET" style="display:inline;" class="deleteForm">
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>

                                                <a href="{{ route('admin.brand.package.detail.index', $data->id) }}" class="btn btn-info btn-sm">Package Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SweetAlert Script --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        document.querySelectorAll('.deleteForm').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "This package will be permanently deleted!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
