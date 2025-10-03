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

            <h3 class="line-title mb-4">Notifications</h3>

            @foreach ($notificationsAll as $notification)
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            @if ($notification->type == 'Campaign')
                                <i class="bi bi-megaphone text-primary fs-2"></i>
                            @elseif($notification->type == 'Chat')
                                <i class="bi bi-chat-dots-fill text-success fs-2"></i>
                            @else
                                <i class="fa fa-user text-muted fs-2"></i>
                            @endif
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold text-dark">{{ $notification->title }}</h6>
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($notification->dateTime)->diffForHumans() }}
                            </small>
                        </div>
                        {{-- <div>
                            @if ($notification->is_read == 'No')
                                <span class="badge bg-danger">New</span>
                            @else
                                <span class="badge bg-secondary">Read</span>
                            @endif
                        </div> --}}
                    </div>
                </div>
            @endforeach

            {{-- Bootstrap Pagination --}}
            <div class="d-flex justify-content-end mt-4">
                {{ $notificationsAll->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>



@endsection
