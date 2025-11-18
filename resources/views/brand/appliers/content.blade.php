@extends('layouts.app')
@section('title', 'Brand Beans | Applier Uploaded Content')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Applier Uploaded Content</h4>

    @forelse ($applies as $apply)
        <div class="card mb-4 p-3">

            <h5 class="mb-3">
                <strong>Influencer ID:</strong> {{ $apply->influencerid ?? 'N/A' }}
            </h5>

            {{-- FILE PREVIEW --}}
            <p><strong>Uploaded File:</strong></p>

            @if (!empty($apply->uploadActivityPhoto))

                @php
                    $file = $apply->uploadActivityPhoto;
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                    $isVideo = in_array($ext, ['mp4', 'mov', 'avi', 'mkv']);
                @endphp

                {{-- IMAGE PREVIEW --}}
                @if ($isImage)
                    <img src="{{ asset('uploadActivityPhoto/'.$file) }}"
                         class="img-fluid rounded mb-2"
                         style="max-width: 250px; border:1px solid #ccc;">
                @endif

                {{-- VIDEO PREVIEW --}}
                @if ($isVideo)
                    <video width="300" height="200" controls class="rounded mb-2" style="border:1px solid #ccc;">
                        <source src="{{ asset('uploadActivityPhoto/'.$file) }}" type="video/{{ $ext }}">
                        Your browser does not support the video tag.
                    </video>
                @endif

                {{-- OTHER FILE TYPES --}}
                @if (!$isImage && !$isVideo)
                    <a href="{{ asset('uploadActivityPhoto/'.$file) }}" target="_blank">View File</a>
                @endif

            @else
                <p>No file uploaded</p>
            @endif

            <hr>

            {{-- ACTIVITY LINK --}}
            <p><strong>Activity Link:</strong>
                @if (!empty($apply->uploadActivityLink))
                    <a href="{{ $apply->uploadActivityLink }}" target="_blank">
                        {{ $apply->uploadActivityLink }}
                    </a>
                @else
                    No link uploaded
                @endif
            </p>

            {{-- STATUS --}}
            <p><strong>Status:</strong> {{ $apply->status ?? 'N/A' }}</p>
            <p><strong>Brand Approval:</strong> {{ $apply->brandApproved ?? 'Pending' }}</p>
            <p><strong>Remark:</strong> {{ $apply->remark ?? 'N/A' }}</p>

            <p><strong>Uploaded At:</strong> {{ $apply->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $apply->updated_at }}</p>

        </div>
    @empty
        <div class="alert alert-warning">No appliers found for this campaign.</div>
    @endforelse
</div>
@endsection
