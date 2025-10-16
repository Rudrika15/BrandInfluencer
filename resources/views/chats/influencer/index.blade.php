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

        .search-container {
            position: relative;
            width: 100%;
            max-width: 350px;
            margin: 10px auto;
        }

        .search-input {
            width: 100%;
            padding: 10px 45px 10px 45px;
            border: 1px solid #ddd;
            border-radius: 50px;
            background-color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .search-input:focus {
            outline: none;
            border-color: #15c6eb;
            box-shadow: 0 0 6px rgba(255, 0, 128, 0.3);
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 20px;
            color: #888;
        }

        .clear-btn {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 18px;
            color: #888;
            cursor: pointer;
            display: none;
        }

        .search-input:valid~.clear-btn {
            display: block;
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
                    <div class="search-container">
                        <span class="material-symbols-outlined search-icon">search</span>
                        <input type="search" id="search" class="search-input" placeholder="Search chats..." required>
                        <button type="button" class="clear-btn" onclick="document.getElementById('search').value=''">×</button>
                    </div>


                    <hr>
                    {{-- {{ Auth::user()->session }} <br> --}}
                    {{-- @if (Auth::user()->hasRole(['Influencer']))
                        <h1>Influencer</h1>
                    @endif --}}
                    @if (count($chats) > 0)
                        @foreach ($chats as $chat)
                            <div class="bg-light pt-3 chat-item" style="cursor: pointer;" data-brand-id="{{ $chat->brandId }}" data-influencer-id="{{ $chat->influencerId }}">
                                <span class="ps-3">

                                    @if (Auth::user()->hasRole('Influencer'))
                                        <img src="{{ asset('profile') }}/{{ $chat->brand->profilePhoto }} " onerror="this.src='{{ asset('images/default.jpg') }}'" class="rounded-circle" style="object-fit: contain; width: 40px; height: 40px; " alt="">
                                    @endif
                                    @if (Auth::user()->hasRole('Brand'))
                                        <img src="{{ asset('profile') }}/{{ $chat->influencer->profilePhoto }} " onerror="this.src='{{ asset('images/default.jpg') }}'" class="rounded-circle" style="object-fit: contain; width: 40px; height: 40px; " alt="">
                                    @endif
                                    <b class="ps-2">
                                        @if (Auth::user()->hasRole('Influencer'))
                                            {{ $chat->brand->name }}
                                        @endif

                                        @if (Auth::user()->hasRole('Brand'))
                                            {{ $chat->influencer->name }}
                                        @endif
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
                        <span>You have No Chats</span>
                    @endif

                    <!-- Empty list element to display fetched user names -->
                    <ul id="user-list"></ul>
                    {{-- @foreach ($chats as $item)
                        {{ $item->id }}
                    @endforeach --}}

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
                                {{-- <div class="pt-2 text-center">

                                    <img src="{{ asset('profile') }}/{{ Auth::user()->profilePhoto }}"
                                        class="rounded-circle" width="100px" alt="">
                                </div> --}}
                                <span class="text-muted">
                                    Select a chat to start messaging
                                </span>
                            </div>
                        </div>
                        <div id="chatFooter" class="p-3 border-top">
                            <form id="sendMessageForm">
                                @csrf
                                <input type="hidden" name="receiverId" id="receiverId" value="">
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

    @php
        $findRole = Auth::user()->roles->pluck('name')->toArray();
    @endphp

    <script>
        var roles = @json($findRole);
    </script>

    <!-- Clean overrides: restore first-change behavior using groupId, disable broken handlers -->
    
    <script>
        $(document).ready(function() {
            $('#chatFooter').hide();
            var sessionRole = '{{ session('role') }}';
            console.log("Session role:", sessionRole);

            // Function to handle storing of chat messages via AJAX
            function storeChatMessage(groupId, message) {
                $.ajax({
                    url: '{{ route('find.new.chat.store') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        groupId: groupId,
                        message: message
                    },
                    success: function(response) {
                        console.log("Chat message stored:", response);
                        // Optionally, you can perform additional actions after successful storage
                    },
                    error: function(xhr, status, error) {
                        console.error("Error storing chat message:", error);
                    }
                });
            }

            // When clicking on a chat item
            $('.chat-item').click(function() {
                var senco so {.log('re Aiveuth:',:rgyoiveuIae access to the sender'sinfluenceI                varinfluenceriverId =(this).data('bravar-md)age = " "; // Exampl  m ssag ns   ole.log('recevarigroupIdv=erId:goup-i        r influencerId = $(tcon.oa'-'og)'g;oupId of 
hat:', g oup           var message = " "; // EReme v i.val();
 of char );   $('#selectedReceiverId').val(receiverId);
                if (roles.includes('Ifiluencer')) {
                    $('#recevierId').val(receiverId);
                }
                if (roles.includsi('Brand')) {
                    $('#receviId').val(influencerId);
                }
                var receiverName = $(this).find('b').text().trim();
       ame);

                // Store the chat message
                storeChatMess ge(groupId,  essag       $('#receiverName').text(receiverName);

                // Store the chat message
                storeChatMessage(groupId, message);

                // Fetch and display chat messages related to the selected receiverId
                fetchChatMessages(receiverId, influencerId);
            });

            // Fetch chat messages via AJAX
            function fetchChatMessages(brandId, influencerId) {
                console.warn('brandId', brandId);
                var url = '/chats/messages/' + brandId + '/' + influencerId;
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
                            console.log("chatGroup", chatGroup);
                            var messageHtml = '<div class="message">';
                            var authCheck = '{{ Auth::id() }}';
                            console.log("authCheck", authCheck);
                            if (chatGroup.session !== sessionRole) {
                                // if (!authCheck) {
                                messageHtml +=
                                    '<div style="background-color: #156b9f;" class="badge text-white rounded-pill fs-6 text p-3 mb-2">' +
                                    chatGroup.message + '</div>';
                            } else {
                                messageHtml +=
                                    '<div style="background-color: #00b9f0;" class="badge text-white rounded-pill fs-6 text text-end p-3 mb-2 float-end">' +
                                    chatGroup.message + '</div>';
                            }

                            messageHtml += '</div>';

                            // Append the message HTML to the chat body
                                  //uming the first chat group contains the groupId
              (response[0].groupId);
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
                        //

                        // window.location.reload(); Refresh chat messages

                       bw.locaForGetChattion.l();
                        // console.roge'receiverId:', receiverIdload();

                        var receiverId =idIdForGetChForGetChatat').l();
                        // console.voga'influencerId:', influencerIdl();
                        // console.log('receiverId:', receiverId);
                        var influencerId = $('#influencerIdForGetChat').val();
                        // console.log('influencerId:', influencerId);
                        fetchChatMessages(receiverId, influencerId);
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
                        url: '/new/chats',
                        type: 'GET',
                        data: {
                            search: value
                        },
                        success: function(response) {
                            $('#user-list').empty();
                            // $.each(response.users, function(index, user) {
                            //     $('#user-list').append(
                            //         '<li class="user-item" style="cursor: pointer;" data-user-id="' +
                            //         user.id + '">' + user.name + '</li>');
                            // });

                            $('.user-item').click(function() {
                                var userId = $(this).data('user-id');
                                addUserToTable(userId);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);

                        }
                    });
                } else {
                    $('#user-list').empty();
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
