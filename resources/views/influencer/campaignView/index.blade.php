@extends('layouts.app')
@section('title', 'Brand beans | Brand Campaign')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="line-title"><h3>Campaign Details</h3></div>
                <a href="{{ route('home')}}" class="btn btn-primary btn-sm mb-3">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
    <div class="card" style="width: 95%">

        <div class="card-body">

            <div class="p-3">
                <h4 class="card-title text-uppercase mb-3">{{ $campaign->title }}</h4>
                <small>Posted {{ $campaign->created_at->diffForHumans() }}</small>
                <div class="col-2 mt-3 text-center d-flex flex-column gap-2">
                    <h4 class="rounded" style="background-color: rgb(231, 227, 227); height: 35px">
                        <small class="lead"><b>₹ {{ $campaign->price }}</b></small>
                    </h4>
                     <a class="btn btn-success btn-sm" href="{{ route('brand.campaign.campaign.step', $campaign->id) }}">
                    Campaign Steps
                </a>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="row p-3 gap-3">
                {{-- Message button --}}
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="col rounded-pill" style="border: solid 1px black">
                    <div class="p-3 text-center">
                        <span>Message</span>
                    </div>
                </button>

                {{-- Apply Button / Already Applied --}}
                @if ($campaignCount != 0)
                    <div class="col text-white p-3 text-center bg-secondary rounded-pill">
                        <b>Already Applied</b>
                    </div>
                @else
                    <form class="col" action="{{ route('influencer.campaignApply') }}" method="post">
                        @csrf
                        <input type="hidden" name="campaignId" value="{{ $campaign->id }}">
                        <button type="submit" class="rounded-pill w-100 btn-primary shadow-none" style="border: none">
                            <div class="text-white p-3 text-center">
                                <b>Apply</b>
                            </div>
                        </button>
                    </form>
                @endif
            </div>

            {{-- Message Modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send Message to {{ $campaign->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('new.influencer.chat.index') }}" method="post">
                                @csrf
                                <input type="hidden" name="receiverId" value="{{ $campaign->user->id ?? '' }}">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="message" placeholder="Write a message">
                                    <button class="btn btn-outline-info" type="submit">
                                        <i class="bi bi-send"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Campaign Details --}}
            <div class="ps-4" style="padding-top: 35px;">
                <h5 class="card-text mb-3">Description</h5>
                <p>{{ $campaign->detail }}</p>

                <h5 class="card-text mb-3 mt-5">Rules</h5>
                <p>{{ $campaign->rule }}</p>

                <h5 class="card-text mb-3 mt-5">Eligible Criteria</h5>
                <p>{{ $campaign->eligibleCriteria }}</p>

                <h5 class="card-text mb-3 mt-5">Target Gender</h5>
                <p>{{ $campaign->targetGender }}</p>

                <h5 class="card-text mb-3 mt-5">Target Age Group</h5>
                <p>{{ $campaign->targetAgeGroup }}</p>

                <h5 class="card-text mb-3 mt-5">Start Date</h5>
                <p>{{ $campaign->startDate }}</p>

                <h5 class="card-text mb-3 mt-5">End Date</h5>
                <p>{{ $campaign->endDate }}</p>

                <h5 class="card-text mb-3 mt-5">Apply For Last Date</h5>
                <p>{{ $campaign->applyForLastDate }}</p>

                <h5 class="card-text mb-3 mt-5">Task</h5>
                <p>{{ $campaign->task }}</p>

                <h5 class="card-text mb-3 mt-5">Max Application</h5>
                <p>{{ $campaign->maxApplication }}</p>


            </div>
        </div>
    </div>
</div>
@endsection
