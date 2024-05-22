@extends('layouts.app')
@section('title', 'Brand beans | Brand Campaign')
@section('content')

    <div class='container'>
        <div class='row'>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- <div class='col-md-12'> --}}
            {{-- <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Brand Campaigns</h3>
                    </div>

                </div> --}}
            {{-- </div> --}}
        </div>
        <div class="row ps-5">
            <div class="col-md-12">
                <div class="card w-75">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($campaign as $data)
                                {{-- {{ $data->user }} --}}
                                <div class="col-md-12">
                                    {{-- <h4 class="card-title"> {{ $data->title }}</h4> --}}
                                    {{-- <img src="{{ asset('campaignPhoto') }}/{{ $data->photo }}" alt="image"
                                                class="img-thumbnail w-100"> --}}
                                    <img src="{{ asset('campaignPhoto') }}/1698906013.jpg" class="rounded" alt="image">
                                    <div class="p-3">
                                        <h4 class="card-title text-uppercase mb-3"> {{ $data->title }}</h4>

                                        <small>Posted {{ $data->created_at->diffForHumans() }}</small>
                                        <div class="col-2 mt-3 text-center">
                                            <h4 class="rounded" style="background-color: rgb(231, 227, 227); height: 35px">
                                                <small class="lead"> <b> ₹ {{ $data->price }} </b> </small>
                                            </h4>
                                        </div>
                                    </div>
                                    {{-- <div class="h-12 text-center rounded-full border border-black">
                                        <button class="btn btn-info">Message</button>
                                    </div> --}}

                                    <div class="row p-3 gap-3">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            class="col rounded-pill" style="border: solid 1px black">
                                            <div class="p-3 text-center">
                                                <span>Message</span>
                                            </div>
                                        </button>
                                        <a href="" class="col rounded-pill btn-primary">
                                            <div class="text-white p-3  text-center">
                                                <b> <span>Apply</span> </b>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Send Message to
                                                        {{ $data->title }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('new.influencer.chat.index') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="receiverId"
                                                            value="{{ $data->user->id }}">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="message"
                                                                placeholder="Write a message"
                                                                aria-label="Recipient's username"
                                                                aria-describedby="button-addon2">
                                                            <button class="btn btn-outline-info" type="submit"
                                                                id="button-addon2">
                                                                <i class="bi bi-send"></i> </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-4">
                                        <div class="col" style="padding-top:35px;">

                                            <h5 class="card-text mb-3">
                                                Description
                                            </h5>
                                            <p>{{ $data->detail }}. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Esse veniam facilis mollitia, iste maxime earum sit et odit, quos dolorem
                                                quae natus distinctio ipsa deleniti tenetur beatae libero eum voluptatibus?
                                            </p>


                                            <h5 class="card-text mb-3 mt-5 "> Rules </h5>
                                            <p>{{ $data->rule }}</p>

                                            <h5 class="card-text mb-3 mt-5">Eligible Criteria </h5>
                                            <p> {{ $data->eligibleCriteria }}</p>

                                            <h5 class="card-text mb-3 mt-5">Target Gender </h5>
                                            <p> {{ $data->targetGender }} </p>
                                            <h5 class="card-text mb-3 mt-5">Target Age Group
                                            </h5>
                                            <p> {{ $data->targetAgeGroup }} </p>
                                            <h5 class="card-text mb-3 mt-5">Start Date </h5>
                                            <p> {{ $data->startDate }} </p>
                                            <h5 class="card-text mb-3 mt-5">End Date </h5>
                                            <p> {{ $data->endDate }} </p>

                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="card-text mb-3 mt-5">Apply For Last Date </h5>
                                            <p>{{ $data->applyForLastDate }}. </p>

                                            <h5 class="card-text mb-3 mt-5">Task </h5>
                                            <p>{{ $data->task }} </p>
                                            <h5 class="card-text mb-3 mt-5">Max Application </h5>
                                            <p>{{ $data->maxApplication }} </p>
                                            <h5 class="card-text mb-3 mt-5">Status </h5>
                                            <span class="text-success">{{ $data->status }}</span>

                                            {{-- <a class="btn btn-success btn-sm"
                                                href="{{ route('brand.campaign.campaign.step') }}/{{ $data->id }}">Campaign
                                                Steps</a> --}}
                                            {{-- @if ($campaignCount == 1)
                                                    @endif --}}
                                        </div>

                                        <div style="display: flex; justify-content: end">
                                            <form action="{{ route('influencer.campaignApply') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="campaignId" value="{{ $data->id }}">
                                                {{-- <button type="submit" class="btn btn-sm btn-primary">Apply</button> --}}
                                            </form>
                                            {{-- @if ($campaignCount == 0)
                                                @else
                                                    Already applied
                                                @endif --}}
                                        </div>



                                    </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
