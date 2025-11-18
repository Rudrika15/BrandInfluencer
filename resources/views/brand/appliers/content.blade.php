@extends('layouts.app')
@section('title', 'Brand Beans | Applier Uploaded Content')
@section('content')
<div class="container py-4">
    <h4 class="mb-4">Applier Uploaded Content</h4>

    @forelse ($applies as $apply)
        <div class="mb-5">
            <h5 class="mt-3 mb-3">
                <strong>Influencer:</strong> {{ $apply->user->name ?? 'Unknown User' }}
            </h5>

            {{-- Check if influencer has uploaded activity steps --}}
            @if ($apply->activitySteps && $apply->activitySteps->count() > 0)
                <div class="row">
                    @forelse ($applies as $apply)
    <div class="card mb-3 p-3">
        <h5>{{ $apply->user->name ?? 'Unknown' }}</h5>
        <p><strong>Photo:</strong> {{ $apply->activityStep->uploadActivityPhoto ?? 'No photo uploaded' }}</p>
        <p><strong>Link:</strong> {{ $apply->activityStep->uploadActivityLink ?? 'No link uploaded' }}</p>
    </div>
@empty
    <div class="alert alert-warning">No appliers found for this campaign.</div>
@endforelse

                </div>
            @else
                <div class="alert alert-secondary">No uploads yet.</div>
            @endif
        </div>
    @empty
        <div class="alert alert-warning">No appliers found for this campaign.</div>
    @endforelse
</div>
@endsection
