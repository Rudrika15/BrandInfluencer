@extends('layouts.app')
@section('title', 'Brand beans | Brand Campaign')
@section('content')




    <div class='container'>
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
        <div class="container-fluid ">

            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th> Title</th>
                        <th> Price</th>
                        <th> Description</th>
                        <th width="150"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $data)
                        <tr>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{!! $data->description !!}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('influencer.package.edit') }}/{{ $data->id }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('influencer.package.delete') }}/{{ $data->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endsection
