@extends('layouts.app')
@section('title', 'Brand beans | Feedbacks')
@section('content')
    <div class="card w-100">
        <div class="card-header justify-content-center">
            <h1>Requests</h1>
        </div>



        <div class="card-body">
            @if (count($follows) > 0)
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($follows as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <div>
                                    <a href="{{ route('approve', $item->id) }}" class="btn btn-sm btn-success">Approve</a>
                                    <a href="{{ route('remove', $item->id) }}"
                                        onclick="return confirm('Do You Really Want To Reject ?')"
                                        class="btn btn-sm btn-danger">Reject</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-end">
                    {{ $follows->links() }}
                </div>
            @else
                <div class="text-center text-muted mt-5 mb-5">
                    <h4>There Are No Requests</h4>
                </div>
            @endif
        </div>




    </div>


    <div class="card w-100 mt-5">
        <div class="card-header justify-content-center">
            <h1>Followers</h1>
        </div>
        <div class="card-body">
            @if (count($friends) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($friends as $item)
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <a href="{{ route('remove', $item->id) }}"
                                        onclick="return confirm('Do You Want To Remove ?')"
                                        class="btn btn-danger btn-sm shadow-none">Remove</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $friends->links() }}
                </div>
            @else
                <div class="text-center text-muted mt-5 mb-5">
                    <h4>There Are No Followers</h4>
                </div>
            @endif
        </div>

    </div>

@endsection
