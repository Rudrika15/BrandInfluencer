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
                    {{-- <div class="p-2">
                        <a href="{{ route('brand.category.create') }}" class="btn btn-primary btn-sm">Add Brand Category</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th> CreatedBy</th>
                                        <th> Title</th>
                                        <th> Campaign Type </th>
                                        <th> Totle Appliers </th>
                                        <th> Image</th>
                                        {{-- <th> Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campaigns as $data)
                                        <tr>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->campaignType }}</td>
                                            <td><b>Totle Appliers :</b> {{ count($data->AppliedInfluencer) }}
                                                <br>
                                                @foreach ($data->AppliedInfluencer as $user)
                                                    {{ $user->user->name ?? 'no name ' }},
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td><img src="{{ asset('campaignPhoto') }}/{{ $data->photo }}" alt="{{ __('main image') }}" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $campaigns->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
