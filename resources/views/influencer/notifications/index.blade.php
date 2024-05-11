@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')
    <style>
        .nav-link {
            color: black;
            font-weight: 400;
            font-size: 120%;

        }

        .nav-tabs {
            border-bottom: none;
        }

        .nav-tabs .nav-link {

            border: none !important;
            background-color: transparent !important;

        }



        /* Override Bootstrap nav-link hover effect */
        .nav-tabs .nav-link:hover {
            background-color: transparent;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 2px solid #000 !important;
            padding-bottom: 0% !important;
            color: black !important;

            /* Adjust the color and thickness as needed */
        }
    </style>

    <h3>Notifications</h3>

    <ul class="nav nav-tabs mt-4" id="myTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link text-muted  active" id="All-tab" data-bs-toggle="tab" data-bs-target="#All" type="button"
                role="tab" aria-controls="All" aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-muted " id="Social-tab" data-bs-toggle="tab" data-bs-target="#Social"
                type="button" role="tab" aria-controls="Social" aria-selected="true">Social</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-muted  " id="News-tab" data-bs-toggle="tab" data-bs-target="#News" type="button"
                role="tab" aria-controls="News" aria-selected="false">News</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-muted  " id="Sponserships-tab" data-bs-toggle="tab" data-bs-target="#Sponserships"
                type="button" role="tab" aria-controls="Sponserships" aria-selected="false">Sponserships</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content mt-4" id="myTabsContent">
        <div class="tab-pane fade active show " id="All" role="tabpanel" aria-labelledby="All-tab">


            <div class="row w-75">
                <div class="col-md-1">
                    <i class="fa fa-user fa-4x text-muted" aria-hidden="true"></i>
                </div>
                <div class="col-md-10">
                    <span class="">Zouk</span> <br>
                    <small class="text-muted">20 hrs ago</small>
                </div>
                <div class="col-md-1 ">
                    <img src="{{ asset('images/default.jpg') }}" class="img-thumbnail " alt="">
                </div>

                <hr class="mt-2">
            </div>
        </div>


        <div class="tab-pane fade " id="Social" role="tabpanel" aria-labelledby="Social-tab">

            <div class="row w-75">
                <div class="col-md-1">
                    <i class="fa fa-user fa-4x text-muted" aria-hidden="true"></i>
                </div>
                <div class="col-md-10">
                    <span class="">Zouk</span> <br>
                    <small class="text-muted">20 hrs ago</small>
                </div>
                <div class="col-md-1 ">
                    <img src="{{ asset('images/default.jpg') }}" class="img-thumbnail " alt="">
                </div>

                <hr class="mt-2">
            </div>

        </div>
        <div class="tab-pane fade" id="News" role="tabpanel" aria-labelledby="News-tab">

            <div class="row w-75">
                <div class="col-md-1">
                    <i class="fa fa-user fa-4x text-muted" aria-hidden="true"></i>
                </div>
                <div class="col-md-10">
                    <span class="">Zouk</span> <br>
                    <small class="text-muted">20 hrs ago</small>
                </div>
                <div class="col-md-1 ">
                    <img src="{{ asset('images/default.jpg') }}" class="img-thumbnail " alt="">
                </div>

                <hr class="mt-2">
            </div>
        </div>
        <div class="tab-pane fade" id="Sponserships" role="tabpanel" aria-labelledby="Sponserships-tab">

            <div class="row w-75">
                <div class="col-md-1">
                    <i class="fa fa-user fa-4x text-muted" aria-hidden="true"></i>
                </div>
                <div class="col-md-10">
                    <span class="">Zouk</span> <br>
                    <small class="text-muted">20 hrs ago</small>
                </div>
                <div class="col-md-1 ">
                    <img src="{{ asset('images/default.jpg') }}" class="img-thumbnail " alt="">
                </div>

                <hr class="mt-2">
            </div>
        </div>
    </div>




@endsection
