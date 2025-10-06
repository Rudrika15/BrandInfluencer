<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-sm btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                <a class="btn btn-sm btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>

                @if ($role->name != 'Admin')
                    @can('role-delete')
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;" class="deleteForm">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endcan
                @endif
            </td>
        </tr>
    @endforeach
</table>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.querySelectorAll('.deleteForm').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "This role will be permanently deleted!",
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
