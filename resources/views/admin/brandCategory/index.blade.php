@extends('admin.layouts.app')
@section('title', 'Brand beans | Brand Category')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Brand Category</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('brand.category.create') }}" class="btn btn-primary btn-sm">Add Brand Category</a>
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
                                        <th>Name</th>
                                        <th>Icons</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brandCategory as $data)
                                        <tr>
                                            <td>{{ $data->categoryName }}</td>
                                            <td>
                                                <img src="{{ $data->icon ? asset('brandCategoryIcon/' . $data->icon) : 'https://via.placeholder.com/100' }}" alt="main image" style="min-height:100px;min-width:100px;max-height:100px;max-width:100px">
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('brand.category.edit', $data->id) }}">Edit</a>

                                                <form action="{{ route('brand.category.delete', $data->id) }}" method="GET" style="display:inline;" class="deleteForm">
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $brandCategory->links() }}
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
                    text: "This brand category will be permanently deleted!",
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
