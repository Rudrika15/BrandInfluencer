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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 bg-white" style="height: 600px; overflow-y: auto;">
                    <div class="pt-2 mt-1 bg-light rounded-pill">
                        <button style="background: none; border: none; padding: 0;">
                            <span style="font-size: 20px; vertical-align: -1px; color: #9B9B9B" class="material-symbols-outlined">search</span>
                        </button>
                        <input style="vertical-align: 4px; width: 255px;" type="search" name="focus" placeholder="Search" id="search" value="">
                    </div>
                    <hr>
                    @if (count($chats) > 0)
                        @foreach ($chats as $chat)
                            <div class="bg-light pt-3 chat-item" data-brand-id="{{ $chat->brandId }}">
                                <span class="ps-3">
                                    @if ($chat->brand->profile)
                                        <img src="{{ asset('profile') }}/{{ $chat->brand->profile->profilePhoto }}" class="rounded-circle" width="40px" alt="">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" class="rounded-circle" width="40px" alt="">
                                    @endif
                                    <b class="ps-2">
                                        {{ $chat->brand->name }}
                                        @if ($chat->messages && $chat->messages->isNotEmpty())
                                            <small class="text-muted">{{ $chat->messages->last()->content }}</small>
                                        @endif
                                    </b>
                                </span>
                                <hr>
                            </div>
                        @endforeach
                        <br>
                    @else
                        <span>No Chats</span>
                    @endif

                    <!-- Empty list element to display fetched user names -->
                    <ul id="user-list"></ul>
                </div>
                <div class="col-md-7 bg-light" style="height: 600px;">
                    <div class="d-flex flex-column h-100">
                        <div id="chatHeader" class="p-3 border-bottom">
                            <h5 id="receiverName">Selected Chat Receiver Name</h5>
                        </div>
                        <div id="chatBody" class="flex-grow-1 overflow-auto p-3 align-self-end w-100" style="display: flex; flex-direction: column-reverse;">
                            {{-- <div class="bg-danger text-end">influencer message </div>
                            <div class="bg-warning">brand message </div> --}}
                            <div style="height: 600px; align-self: center; padding-top: 100px" id="defaultMessage">
                                <span class="text-muted">You have no conversations</span>
                            </div>
                        </div>
                        <div id="chatFooter" class="p-3 border-top">
                            <form id="sendMessageForm">
                                @csrf
                                <input type="hidden" name="brandName" id="selectedReceiverId" value="">
                                <input type="hidden" name="groupId" id="groupId" value="">
                                <div class="input-group">
                                    <input name="message" class="form-control" placeholder="Type a message">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#chatFooter').hide();
            var sessionRole = '{{ session('role') }}';
            console.log("Session role:", sessionRole);
            // When clicking on a chat item
            $('.chat-item').click(function() {
                var brandId = $(this).data('brand-id');
                var receiverName = $(this).find('b').text();
                $('#selectedReceiverId').val(brandId);
                $('#receiverName').text(receiverName);
                // Fetch and display chat messages related to the selected receiverId
                // console.log('receiverId', brandId);

                fetchChatMessages(brandId);
            });

            // Fetch chat messages via AJAX
            function fetchChatMessages(brandId) {
                var url = '/chats/messages/' + brandId;
                $('#chatFooter').show();
                console.log(url);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {
                        // Clear the chat body before appending new messages
                        console.log("response", response);
                        $('#chatBody').empty();

                        // Iterate over the array of messages and construct HTML elements for each message
                        response.forEach(function(chatGroup) {
                            var messageHtml = '<div class="message">';

                            // Check if the session is not equal to the session role
                            if (chatGroup.session !== sessionRole) {
                                messageHtml += '<div style="background-color: #156b9f;" class="badge text-white rounded-pill fs-6 text p-3 mb-2">' + chatGroup.message + '</div>';
                            } else {
                                messageHtml += '<div style="background-color: #00b9f0;" class="badge text-white rounded-pill fs-6 text text-end p-3 mb-2 float-end">' + chatGroup.message + '</div>';
                            }

                            messageHtml += '</div>';

                            // Append the message HTML to the chat body
                            $('#chatBody').prepend(messageHtml);
                        });

                        // Assuming the first chat group contains the groupId
                        $('#groupId').val(response[0].groupId);
                    },




                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Submitting the form via AJAX
            $('#sendMessageForm').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('influencer.chat.store') }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        // Clear the message input
                        $('#sendMessageForm input[name="message"]').val('');
                        // Refresh chat messages
                        fetchChatMessages($('#selectedReceiverId').val());
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>



    {{-- search functionality --}}
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('.chat-item').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });

                // If chat item is not found, call AJAX to fetch data from user table
                if ($('.chat-item:visible').length === 0) {
                    console.log('No results found');
                    $.ajax({
                        url: '/new/chats', // Update the URL according to your route
                        type: 'GET',
                        data: {
                            search: value
                        },
                        success: function(response) {
                            // Update chat interface with fetched user data
                            $('#user-list').empty(); // Clear previous results
                            $.each(response.users, function(index, user) {
                                $('#user-list').append('<li class="user-item" style="cursor: pointer;" data-user-id="' + user.id + '">' + user.name + '</li>');
                            });

                            // Add click event listener to user items
                            $('.user-item').click(function() {
                                var userId = $(this).data('user-id');
                                addUserToTable(userId);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error
                        }
                    });
                } else {
                    $('#user-list').empty(); // Clear the user list if chat items are found
                }
            });
        });

        function addUserToTable(userId) {
            $.ajax({
                url: '/add-user-to-table', // Update the URL according to your route
                type: 'POST',
                data: {
                    user_id: userId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error
                }
            });
        }
    </script>


@endsection
