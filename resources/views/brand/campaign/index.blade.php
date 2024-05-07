@extends('layouts.app')
@section('title', 'Brand beans | Slogans List')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3 class="line-title">Campaigns</h3>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid ">

            @include('brand.campaign.table')
        </div>
    </div>



@endsection
