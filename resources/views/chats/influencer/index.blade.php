@extends('layouts.app')
@section('title', 'Brand beans | Brand Campaign')
@section('content')


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,200,0,0" />

    <style>
        @font-face {
            font-family: Proxima Nova;
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.eot);
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.eot?#iefix) format("embedded-opentype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.woff2) format("woff2"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.woff) format("woff"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.ttf) format("truetype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_1_0.svg#wf) format("svg");
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: Proxima Nova;
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.eot);
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.eot?#iefix) format("embedded-opentype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.woff2) format("woff2"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.woff) format("woff"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.ttf) format("truetype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_4_0.svg#wf) format("svg");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: Proxima Nova;
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.eot);
            src: url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.eot?#iefix) format("embedded-opentype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.woff2) format("woff2"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.woff) format("woff"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.ttf) format("truetype"), url(https://d25purrcgqtc5w.cloudfront.net/dist/fonts/proximanova/302D42_5_0.svg#wf) format("svg");
            font-weight: 700;
            font-style: normal;
        }

        .search-box {
            font-size: 30px;
            padding: 14px 19px;
            border: 1px solid #C1C1C1;
            background-color: white;
            width: 9.8em;
            border-radius: 10px;
            transition: .2s;
        }

        .search-box:hover {
            border-color: #AAAAAA;
        }

        .search-box:focus-within {
            border-color: #FF0080;
            box-shadow: 0 0 0 5px rgba(255, 0, 128, 0.40);
        }

        input {
            font-family: Proxima Nova;
            letter-spacing: -0.2px;
            background-color: transparent;
            font-size: 20px;
            border: none;
            border-radius: 30% color: #323232;
            /* border-top-left-radius: 50px;
                                                                                                                                                                                                                                                                                                        border-bottom-left-radius: 50px; */
        }

        button:hover {
            cursor: pointer;
            border: none
        }

        input:focus {
            outline: none;
        }

        input[type='search']::-webkit-search-cancel-button {
            -webkit-appearance: none;
        }

        .clear:not(:valid)~.search-clear {
            display: none;
        }
    </style>

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3 class="line-title">Chats</h3>
                    </div>


                </div>
            </div>
        </div>
        <div class="container-fluid ">

            <div class="row">
                <div class="col-md-5  bg-white h-100">
                    <div class="pt-2 mt-1 bg-light  rounded-pill">
                        <button style="background: none; border: none; padding: 0; "><span style="font-size: 20px; vertical-align: -1px; color: #9B9B9B" class="material-symbols-outlined">search</span></button>
                        <input style="vertical-align: 4px; width: 255px;" type="search" name="focus" placeholder="Search" id="search-input" value="">
                    </div>
                    <hr>

                    {{-- {{ $chats }} --}}
                    @foreach ($chats as $chat)
                        <div class="bg-light pt-3">
                            <span class="ps-3">
                                @if ($chat->sender->image)
                                    <img src="{{ asset('profile') }}/{{ $chat->sender->image }}" class="rounded-circle" width="40px" alt="">
                                @else
                                    <img src="{{ asset('images/defaultPerson.jpg') }}" class="rounded-circle" width="40px" alt="">
                                @endif
                                <b class="ps-2">
                                    {{ $chat->sender->name }}
                                    @if ($chat->messages && $chat->messages->isNotEmpty())
                                        <small class="text-muted">{{ $chat->messages->last()->content }}</small>
                                    @endif
                                </b>
                            </span>
                            <hr>
                        </div>
                    @endforeach
                    <br>



                </div>
                <div class="col-md-7 bg-light"> chats</div>
            </div>

        </div>
    </div>

@endsection
