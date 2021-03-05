@extends('layouts.master')

@section('title', 'Messages')

@section('metas')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Message</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Messages Box</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
            START MESSAGE AREA
    =================================-->
    <section class="message_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_title">
                        <h3>Messages</h3>
                    </div>
                    <!-- end /.content_title -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-lg-5">
                    <div class="cardify messaging_sidebar">
                        <div class="messaging__header">
                            <div class="messaging_menu">
                                <a href="#" id="drop2" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-inbox"></span>Inbox
                                    <span class="msg">6</span>
                                    <span class="lnr lnr-chevron-down"></span>
                                </a>

                                <ul class="custom_dropdown messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-inbox"></span>Inbox</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-star-o"></span>Starred</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-dice"></span>Sent</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-trash"></span>Trash</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.messaging_menu -->

                            <div class="messaging_action">
                                <span class="lnr lnr-trash"></span>
                                <span class="lnr lnr-sync"></span>

                                <a href="{{ route('create_message') }}" class="btn btn--round btn--sm">
                                    <span class="lnr lnr-pencil"></span>
                                    <span class="text">Compose</span>
                                </a>
                            </div>
                            <!-- end /.messaging_action -->
                        </div>
                        <!-- end /.messaging__header -->

                        <div class="messaging__contents">
                            <div class="message_search">
                                <input type="text" placeholder="Search messages...">
                                <span class="lnr lnr-magnifier"></span>
                            </div>

                            @foreach ($conversations as $conversation)
                                @if($conversation->getMessages()->count() > 0)
                                    <div class="messages">
                                        <div class="message active" style="cursor: pointer;" data-conversation="{{ $conversation->id }}"
                                            @if($conversation->sender_id == auth()->user()->id) data-other="{{ $conversation->receiver_id }}"
                                            @elseif($conversation->receiver_id == auth()->user()->id) data-other="{{ $conversation->sender_id }}"
                                            @endif
                                            >
                                                <div class="message__actions_avatar">
                                                    <div class="actions">
                                                        <span class="fa fa-star-o"></span>
                                                        <div class="custom_checkbox">
                                                            <input type="checkbox" id="ch2">
                                                            <label for="ch2">
                                                                <span class="shadow_checkbox"></span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    @if($conversation->sender_id == auth()->user()->id)
                                                        <div class="avatar">
                                                            <img src="{{ asset($conversation->getReceiver()->first()->profile_photo) }}" alt="">
                                                        </div>
                                                    @elseif($conversation->receiver_id == auth()->user()->id)
                                                        <div class="avatar">
                                                            <img src="{{ asset($conversation->getSender()->first()->profile_photo) }}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- end /.actions -->

                                                <div class="message_data">
                                                    <div class="name_time">
                                                        @if($conversation->sender_id == auth()->user()->id)
                                                            <div class="name">
                                                                <p>{{ $conversation->getReceiver()->first()->first_name }}</p>
                                                                <span class="lnr lnr-envelope"></span>
                                                            </div>
                                                        @elseif($conversation->receiver_id == auth()->user()->id)
                                                            <div class="name">
                                                                <p>{{ $conversation->getSender()->first()->first_name }}</p>
                                                                <span class="lnr lnr-envelope"></span>
                                                            </div>
                                                        @endif
                                                            <span class="time">
                                                                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($conversation->getMessages()->orderBy('created_at', 'desc')->first()->created_at))->diffForHumans() }}
                                                            </span>
                                                            <p>{{ $conversation->getMessages()->orderBy('created_at', 'desc')->first()->message }}</p>
                                                    </div>
                                                </div>
                                                <!-- end /.message_data -->
                                        </div>
                                        <!-- end /.message -->
                                    </div>
                                    <!-- end /.messages -->
                                @endif
                            @endforeach
                        </div>
                        <!-- end /.messaging__contents -->
                    </div>
                    <!-- end /.cardify -->
                </div>
                <!-- end /.col-md-5 -->

                <!-- Conversaiton insight -->
                <div id="conversation-insight" class="col-lg-7 d-none">
                    <div class="chat_area cardify">
                        <div class="chat_area--title">
                            <h3>Message with
                                <span class="name">Codepoet</span>
                            </h3>
                            <div class="message_toolbar">
                                <a href="#">
                                    <span class="lnr lnr-flag"></span>
                                </a>
                                <a id="delete" href="#">
                                    <span class="lnr lnr-trash"></span>
                                </a>
                                <a href="#" id="drop1" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <img src="{{ asset('images/menu_icon.png') }}" class="dropdown-trigger" alt="Menu icon">
                                </a>

                                <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop1">
                                    <li>
                                        <a href="#">Mark as unread</a>
                                    </li>
                                    <li>
                                        <a href="#">Dropdown link</a>
                                    </li>
                                    <li>
                                        <a href="#">All Attachments</a>
                                    </li>
                                </ul>
                                <!-- end /.dropdown -->
                            </div>
                            <!-- end /.message_toolbar -->
                        </div>
                        <!-- end /.chat_area--title -->

                        <div class="chat_area--conversation" style="height: 90vh; overflow-y: scroll;">
                            <div class="conversation">
                                <div class="head">
                                    <div class="chat_avatar">
                                        <img src="{{ asset('images/notification_head5.png') }}" alt="Notification avatar">
                                    </div>

                                    <div class="name_time">
                                        <div>
                                            <h4>Codepoet</h4>
                                            <p>Mar 2, 2019 at 2:14 pm</p>
                                        </div>
                                    </div>
                                    <!-- end /.name_time -->
                                </div>
                                <!-- end /.head -->

                                <div class="body">
                                    <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec
                                        vitae leo at sem lobortis porttitor eu conse quat risus. Mauris sed congue orci.
                                        Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue.</p>
                                </div>
                                <!-- end /.body -->

                            </div>
                            <!-- end /.conversation -->
                        </div>
                        <!-- end /.chat_area--conversation -->

                        <div class="message_composer">
                            <div class="composer_field" id="trumbowyg-demo"></div>
                            <!-- end /.trumbowyg-demo -->

                            <div class="attached"></div>

                            <div class="btns">
                                <button id="send_btn" class="btn send btn--sm btn--round">Reply</button>
                                <label for="att">
                                    <input type="file" class="attachment_field" id="att" multiple>
                                    <span class="lnr lnr-paperclip"></span>Attachment</label>
                            </div>
                            <!-- end /.message_composer -->
                        </div>
                        <!-- end /.message_composer -->
                    </div>
                    <!-- end /.chat_area -->
                </div>
                <!-- end Conversation insight -->
            </div>
            <!-- end /.row -->
        </div>
    </section>
    <!--================================
            END MESSAGE AREA
    =================================-->
@endsection


@section('scripts')

    <script type="text/javascript">
        let c;
        $(document).ready(function(){
           document.querySelector('#send_btn').addEventListener('click', function(){
            let message = $('#trumbowyg-demo').text();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                    url: '/direct/message',
                    type: 'POST',
                    data: {sender: {{ auth()->id() }}, message: message, conversation_id: c},
                    dataType: 'JSON',
                    success: function (response) {
                        alert(response.msg);
                        let conversation = $('.chat_area--conversation .conversation').first().clone();
                        conversation.find('.name_time h4').text(response.u);
                        conversation.find('.name_time p').text(new Date(response.m.created_at).toLocaleDateString());
                        conversation.find('.body p').text(response.m.message);
                        conversation.appendTo('.chat_area--conversation');
                    },
                    error:function(){
                        alert("İşlem sırasında bir hata oluştu.");
                    },
                });

            });

            $('[data-conversation]').on('click', function(e){
                let conversation_id = $(this).attr('data-conversation');
                c = conversation_id;

                let other_id = $(this).attr('data-other');

                let conversation = $('.chat_area--conversation .conversation').first();
                let conversation_area = $('.chat_area--conversation');

                let message_composer = $('.message_composer');

                let chat_title = $('.chat_area--title');

                $('#delete').attr('href', '/delete/conversation/' + conversation_id);

                $('.chat_area.cardify').empty();
                $.ajax({
                    url: '/get/conversation',
                    type: 'GET',
                    data: {conversation_id: conversation_id, other_user: other_id},
                    dataType: 'JSON',
                    success: function (response) {
                        let owner = response.owner_user;
                        let other = response.target_user;

                        $('#conversation-insight').removeClass('d-none');
                        chat_title.find('span.name').text(other.first_name);

                        conversation_area.empty();

                        for (const index in response.messages) {
                            const message = response.messages[index].message;
                            const sent_date = new Date(response.messages[index].created_at).toLocaleDateString();
                            let sender_name;
                            if(response.messages[index].sender_id == owner.id){
                                sender_name = owner.first_name;
                            }
                            else{
                                sender_name = other.first_name;
                            }

                            conversation.find('.head .name_time h4').text(sender_name);
                            conversation.find('.head .name_time p').text(sent_date);
                            conversation.find('.body p').text(message);

                            conversation.clone().appendTo(conversation_area);
                        }

                        chat_title.appendTo('.chat_area.cardify');
                        conversation_area.appendTo('.chat_area.cardify');
                        message_composer.appendTo('.chat_area.cardify');

                        Echo.private('conversation.' + c)
                            .listen('SendMessageToUser', (e) => {
                                if(e.message.sender_id != owner.id){
                                    const sent_date = new Date(e.message.created_at).toLocaleDateString();
                                    conversation.find('.head .name_time h4').text(e.sender.first_name);
                                    conversation.find('.head .name_time p').text(sent_date);
                                    conversation.find('.body p').text(e.message.message);

                                    conversation.clone().appendTo(conversation_area);
                                }
                        });
                    },
                    error:function(){
                        alert("İşlem sırasında bir hata oluştu.");
                    },
                });
            });
        });
    </script>

@endsection
