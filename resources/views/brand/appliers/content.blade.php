@extends('layouts.app')
@section('title', 'Brand beans | Create Campaign Step')
@section('content')
<div class="container py-4">
    <h4 class="mb-4">Applier Uploaded Content</h4>

    @if ($activitySteps->isEmpty())
        <div class="alert alert-warning">No content available.</div>
    @else
        <div class="row">
            @foreach ($activitySteps as $step)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            {{-- Uploaded Photo --}}
                            @if (!empty($step->uploadedActivityPhoto))
                                <img src="{{ asset('/uploadActivityPhoto/' . $step->uploadedActivityPhoto) }}" 
                                     class="img-fluid rounded mb-2" alt="Uploaded Photo">
                            @endif

                            {{-- Uploaded Video --}}
                            @if (!empty($step->uploadedActivityLink))
                                <video width="100%" height="240" controls class="rounded">
                                    <source src="{{ asset('/uploadActivityVideo/' . $step->uploadedActivityLink) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    
</div>
@endsection