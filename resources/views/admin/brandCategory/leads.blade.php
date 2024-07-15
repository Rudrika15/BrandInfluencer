@extends('admin.layouts.app')
@section('title', 'Brand beans | Brand Category')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3> Brand Leads</h3>
                    </div>

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
                                        <th> Brand Name</th>
                                        <th> User Name</th>
                                        <th> mobile</th>
                                        <th>message</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brandLeads as $data)
                                        <tr>
                                            <td>{{ $data->brandname }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->mobile }}</td>
                                            <td>{{ $data->message }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">{{ $brandLeads->links() }}</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
