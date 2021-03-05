@extends('layouts.master')

@section('title', 'Create Message')

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
                    <h1 class="page-title">Messages</h1>
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
                            <div class="messaging_menu ">
                                <a href="#" id="drop2" class="dropdown-toggle dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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

                                <a href="{{ route('new_message') }}" class="btn btn--round btn--sm">
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

                            <div class="messages">
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch1">
                                                <label for="ch1">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head4.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>NukeThemes</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hello John Smith! Nunc placerat mi ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message active">
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

                                        <div class="avatar">
                                            <img src="images/notification_head5.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Crazy Coder</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch3">
                                                <label for="ch3">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head6.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Hybrid Insane</p>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch4">
                                                <label for="ch4">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head3.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>ThemeXylum</p>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch5">
                                                <label for="ch5">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head4.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>NukeThemes</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hello John Smith! Nunc placerat mi ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch6">
                                                <label for="ch6">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head5.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Crazy Coder</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch7">
                                                <label for="ch7">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head6.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Hybrid Insane</p>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch8">
                                                <label for="ch8">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head3.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>ThemeXylum</p>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch9">
                                                <label for="ch9">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head4.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>NukeThemes</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hello John Smith! Nunc placerat id ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch10">
                                                <label for="ch10">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head5.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Crazy Coder</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch11">
                                                <label for="ch11">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head6.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Hybrid Insane</p>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch12">
                                                <label for="ch12">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head3.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>ThemeXylum</p>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->
                            </div>
                            <!-- end /.messages -->
                        </div>
                        <!-- end /.messaging__contents -->
                    </div>
                    <!-- end /.cardify -->
                </div>
                <!-- end /.col-md-5 -->

                <div class="col-lg-7">
                    <div class="chat_area cardify">
                        <div class="chat_area--title">
                            <h3>Compose New Message</h3>
                        </div>
                        <!-- end /.chat_area--title -->


                        <div class="message_composer composing">
                            <input name="receiver" type="text" class="recipient_field" placeholder="To(username)">
                            <div class="composer_field" id="trumbowyg-demo"></div>
                            <!-- end /.trumbowyg-demo -->

                            <div class="attached"></div>

                            <div class="btns">
                                <button id="send" class="btn send btn--sm btn--round">Send</button>
                                <label for="att">
                                    <input type="file" class="attachment_field" id="att" multiple>
                                    <span class="lnr lnr-paperclip"></span>Attachment</label>

                                <button class="btn btn--round btn--sm cancel_btn">Cancel</button>
                            </div>
                            <!-- end /.message_composer -->
                        </div>
                        <!-- end /.message_composer -->
                    </div>
                    <!-- end /.chat_area -->
                </div>
                <!-- end /.col-md-7 -->
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
            $('#send').on('click', function(e) {
                e.preventDefault();

                let input = $('[name="trumbowyg-demo"]').val();

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                        /* the route pointing to the post function */
                        url: '/send/message',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {message:input, receiver: $('[name="receiver"]').val()},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            alert(data.msg);
                        },
                        error:function(){
                            alert("İşlem sırasında bir hata oluştu.");
                        },
                });

            });
    </script>
@endsection
