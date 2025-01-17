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
    <div class="card w-100 p-3">
        <div class="card-body">


            <h3 class="line-title">Notifications</h3>

            {{-- <div class="row">
                <div class="col-md-12"> --}}
            {{-- <div class="overflow-y-scroll"> --}}

            @foreach ($notificationsAll as $notification)
                <div class="row w-75">
                    <div class="col-md-1">
                        @if ($notification->type == 'Campaign')
                            <i class="bi bi-megaphone fa-3x text-muted"></i>
                        @elseif($notification->type == 'Chat')
                            <i class="bi bi-chat-dots-fill fa-3x text-muted"></i>
                        @else
                            <i class="fa fa-user fa-3x text-muted" aria-hidden="true"></i>
                        @endif
                    </div>
                    <div class="col-md-10 pt-3 ps-3">
                        <span class="fw-bold text-muted">{{ $notification->title }}</span> <br>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($notification->dateTime)->diffForHumans() }}
                        </small>
                    </div>
                    <div class="col-md-1 ">
                        {{-- <img src="{{ asset('images/default.jpg') }}" class="img-thumbnail" width="500px" height="500px"
                        alt=""> --}}
                    </div>

                    <hr class="mt-2">
                </div>
            @endforeach

            {{-- </div> --}}
            {{-- </div>
    </div> --}}

        </div>
    </div>


@endsection
