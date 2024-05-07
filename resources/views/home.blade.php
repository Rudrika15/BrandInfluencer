@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class='container'>

        <div class="row">
            <div class="col-md-12">
                {{-- @foreach ($influencers as $data)
                    @foreach ($data->card->cardportfolio as $images)
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ asset('profile') }}/{{ $data->card->user->profilePhoto }}" alt="Profile Picture">
                <div class="user-info">
                    <h5 class="username">{{ strtoupper($data->name) }}</h5>
                    <p class="post-time">Posted by {{ $data->card->user->name }}</p>
                </div>
            </div>
            <div class="card-body">

                <img src="{{ asset('cardimage') }}/{{ $images->image }}" alt="Post Image" class="post-image card-img">
            </div>
            <div class="card-footer">
                <button class="like-btn"><i class="fa fa-heart"></i> Like</button>
                <button class="comment-btn"><i class="fa fa-comment"></i> Comment</button>
                <button class="share-btn"><i class="fa fa-share"></i> Share</button>
            </div>
        </div>
        @endforeach
        @endforeach --}}



            </div>
        </div>

    </div>
@endsection
