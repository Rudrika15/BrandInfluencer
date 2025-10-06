@extends('admin.layouts.app')
@section('title', 'Brand beans | Brand Activity')
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
                        <h3>Package Activity</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('admin.brand.activity.create') }}" class="btn btn-primary btn-sm">Add Activity</a>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $data)
                                        <tr>
                                            <td>{{ $data->title }}</td>
                                            <td>
                                                <a href="{{ route('admin.brand.activity.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                                <form action="{{ route('admin.brand.activity.delete', $data->id) }}" method="GET" style="display:inline;" class="deleteForm">
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $activities->links() }}
                            </div>
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
                    text: "This activity will be permanently deleted!",
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
