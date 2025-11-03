@extends('layouts.app')
@section('title', 'Brand beans | Create Campaign Step')
@section('content')
    <div class='container'>
        <div class="card w-100">
            <div class="card-body">
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h3 class="line-title">Campaign Appliers Content</h3>
                            </div>

                        </div>
                    </div>    
                </div>    
                <div class="container-fluid ">
                    <table id="" class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th> Step Name</th>
                                <th> Content</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($applierContents as $data)
                                <tr>
                                    <td>
                                        {{ $data->step_name ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $data->content ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection