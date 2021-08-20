@extends('layouts.user')

@section('title', 'Chat')

@section('css')
    <link href="{{ asset('theme/css/mailing-chat.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="rounded" style="border: 1px solid #ccc;">

            <div class="chat-system">
                <div class="hamburger"><i data-feather="menu" class="fea icon-sm icons"></i></div>
                <div class="user-list-box">
                    <div class="search shadow">
                        <i data-feather="search" class="fea icon-sm icons"></i>
                        <input type="text" class="form-control" placeholder="Search" />
                    </div>
                    <div class="people">
                        @foreach ($threads as $item)
                        <div class="person" id="thread_{{ $item->id }}" data-chat="{{ $item->id }}">
                            <div class="pending-pointer"></div>
                            <div class="user-info">
                                 <div class="f-head">
                                     <img src="{{ asset(getOtherParticipant($item->id)->user->avatar) }}" alt="avatar">
                                 </div>
                                 <div class="f-body">
                                     <div class="meta-info">
                                         <span class="user-name" data-name="{{ getOtherParticipant($item->id)->user->name }}">{{ getOtherParticipant($item->id)->user->name }}</span>
                                         <p>he</p>
                                         {{-- <span class="user-meta-time">dfdfdf</span> --}}
                                     </div>
                                 </div>
                             </div>
                         </div>
                        @endforeach
                    </div>
                </div>
                <div class="chat-box" style="border-left: 1px solid #ccc;">
                    <div class="chat-not-selected">
                        <p> <i data-feather="message-square" class="fea icon-sm icons"></i> Click a conversation to chat</p>
                    </div>
                    <div class="chat-box-inner">
                        <div class="chat-meta-user shadow">
                            <div class="current-chat-user-name">
                                <span>
                                    <img src="{{ asset('default.png') }}" alt="dynamic-image">
                                    <span class="name">Campaign #1</span>
                                </span>
                            </div>
                        </div>

                        <div class="chat-conversation-box">
                            <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll">
                                <div class="chat" design-type="2" data-chat="1">

                                </div>
                            </div>
                        </div>
                        <div class="warning-message">
                            <small class="text-muted"><strong>Sharing of such information is prohibited on our platform. This is against to FreeShopps Community Guidelines.</strong></small>
                        </div>
                        <div class="chat-footer shadow">
                            <div class="chat-input">
                                <form class="chat-form" method="POST">
                                    <i data-feather="message-square" class="fea icon-sm icons"></i>
                                    <input type="text" class="mail-write-box form-control" name="message" placeholder="Message" autocomplete="off">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    <script>
        let thread_id = '';
        var prohibited = new Array("payment", "gmail", "email", "contact", "facebook", "whatsapp", "twitter", "linkedIn", "snapchat", "@");
    </script>
    <script src="{{ asset('theme/js/mailbox-chat.js') }}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('bc962cb6c438e5c885c2', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            if (thread_id == data.thread_id) {
                reloadConversation();
            } else {
                let pending = parseInt($('#thread_'+data.thread_id).find('.pending-pointer span').html());
                if (pending) {
                    $('#thread_'+data.thread_id).find('.pending-pointer span').html(pending + 1);
                } else {
                    $('#thread_'+data.thread_id).find('.pending-pointer').html('<span class="badge bg-primary">1</span>');
                }
            }
        });

        var scroll_bottom = function() {
            var card_height = 0;
            $('.chat-conversation-box .bubble').each(function() {
                card_height += $(this).outerHeight();
            });
            $(".chat-conversation-box").scrollTop(card_height);
        }

        var reloadConversation = function(){
            $.get("{{ route('user.chat.get') }}?id="+thread_id, function(messages){
                $('.chat').html(messages);
                scroll_bottom();
            });
        }

        $('.user-list-box .person').on('click', function(event) {
            if ($(this).hasClass('.active')) {
                return false;
            } else {
                thread_id = $(this).attr('data-chat');
                // thread_id = thread_id.toString();
                thread_id = parseInt(thread_id);
                $(this).find('.pending-pointer').html('');
                var personName = $(this).find('.user-name').text();
                var personImage = $(this).find('img').attr('src');
                var hideTheNonSelectedContent = $(this).parents('.chat-system').find('.chat-box .chat-not-selected').hide();
                var showChatInnerContent = $(this).parents('.chat-system').find('.chat-box .chat-box-inner').show();

                if (window.innerWidth <= 767) {
                    $('.chat-box .current-chat-user-name .name').html(personName.split(' ')[0]);
                } else if (window.innerWidth > 767) {
                    $('.chat-box .current-chat-user-name .name').html(personName);
                }
                $('.chat-box .current-chat-user-name img').attr('src', personImage);
                $('.chat').attr('data-chat', thread_id);
                $('.close_dispute').attr('data-chat', thread_id);
                $('.chat').removeClass('active-chat');
                $('.user-list-box .person').removeClass('active');
                $('.chat-box .chat-box-inner').css('height', '100%');
                $(this).addClass('active');
                $('.chat[data-chat = '+thread_id+']').addClass('active-chat');

                // initFirebase();
                reloadConversation();
            }
            $('.chat-meta-user').addClass('chat-active');
            $('.chat-box').css('height', 'calc(100vh - 150px)');
            $('.chat-footer').addClass('chat-active');

            if ($(this).attr('data-status') == "0") {
                $("[name='message']").prop("disabled", true);
            }
        });

        $(".mail-write-box").keyup(function (e) {
            chat_error = false;
            let elm = $(this);
            console.log(checkLegalChatting(elm));
            if (checkLegalChatting(elm)) {
                $(".warning-message").show();
                elm.addClass('prohibited');
            } else {
                $(".warning-message").hide();
                elm.removeClass('prohibited');
            }
        });

        $("form.chat-form").submit(function(e) {
            e.preventDefault();
            var me = $(this),
            message = me.find('[name=message]');

            // if the value of chat_content is empty

            if(message.hasClass('prohibited')) {
                return false
            } else { // if the chat_content value is not empty
                $.ajax({
                    url: '{{ route("user.chat.save") }}',
                    data: {
                        body: message.val().trim(),
                        thread_id: thread_id
                    },
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        message.attr('disabled', true);
                    },
                    complete: function() {
                        message.attr('disabled', false);
                    },
                    success: function() {
                        message.val('');
                        message.focus();
                        scroll_bottom();
                    }
                });
            }
            return false;
        });

        function checkLegalChatting(elm) {
            chat_message = elm.val().toLowerCase();
            $.each(prohibited, function( index, value ) {
                if(chat_message.indexOf(value.toLowerCase()) != -1){
                    chat_error = true;
                }
            });
            if(chat_error) {
                return true;

            } else {
                return false;
            }
        }
    </script>
@endsection
