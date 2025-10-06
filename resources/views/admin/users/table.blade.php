<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Roles</th>
            <th width="30%">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($data as $user)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobileno }}</td>
                <td>
                    @foreach ($user->getRoleNames() as $v)
                        @php
                            switch ($v) {
                                case 'Admin':
                                    $color = 'bg-danger'; // red
                                    break;
                                case 'Brand':
                                    $color = 'bg-primary'; // blue
                                    break;
                                case 'Designer':
                                    $color = 'bg-success'; // green
                                    break;
                                case 'Influencer':
                                    $color = 'bg-warning'; // yellow
                                    break;
                                case 'User':
                                    $color = 'bg-info'; // light blue
                                    break;
                                default:
                                    $color = 'bg-secondary'; // gray
                                    break;
                            }
                        @endphp
                        <label class="badge {{ $color }} text-white">{{ $v }}</label>
                    @endforeach
                </td>

                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">Edit</a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" class="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.querySelectorAll('.deleteForm').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this user!",
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
