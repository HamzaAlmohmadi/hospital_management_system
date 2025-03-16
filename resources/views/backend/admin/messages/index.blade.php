{{-- @extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Messages</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Chat Box</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row align-items-center justify-content-center">
        <div class="col-md-3">
          <div class="card" style="height: 70vh;">
            <div class="card-header">
              <h4>Who's Online?</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled list-unstyled-border">
                @foreach ($chatUsers as $chatUser)
                @php
                    $unseenMessages = \App\Models\Chat::where(['sender_id' => $chatUser->senderProfile->id, 'receiver_id' => auth()->user()->id, 'seen' => 0])->exists();
                @endphp
                <li class="media chat-user-profile" data-id="{{ $chatUser->senderProfile->id }}">
                  <img alt="image" class="mr-3 rounded-circle {{ $unseenMessages ? 'msg-notification' : '' }}" width="50" src="{{ asset($chatUser->senderProfile->image) }}">
                  <div class="media-body">
                    <div class="mt-0 mb-1 font-weight-bold chat-user-name">{{ $chatUser->senderProfile->name }}</div>

                  </div>
                </li>
                @endforeach

              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card chat-box d-none" id="mychatbox" style="height: 70vh;">
            <div class="card-header">
              <h4 id="chat-inbox-title">Chat with Rizal</h4>
            </div>
            <div class="card-body chat-content" data-inbox="">

            </div>
            <div class="card-footer chat-form">
              <form id="message-form">
                <input type="text" class="form-control message-box" placeholder="Type a message" name="message">
                <input type="hidden" name="receiver_id"
                value="" id="receiver_id">

                <button class="btn btn-primary">
                  <i class="far fa-paper-plane"></i>
                </button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection

@push('scripts')
    <script>
        const mainChatInbox = $('.chat-content');

        function formatDateTime(dateTimeString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit'
            }
            const formatedDateTime = new Intl.DateTimeFormat('en-Us', options).format(new Date(dateTimeString));
            return formatedDateTime;
        }

        function scrollTobottom() {
            mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
        }

        $(document).ready(function(){
            $('.chat-user-profile').on('click', function(){
                let receiverId = $(this).data('id');
                let receiverImage = $(this).find('img').attr('src')
                let chatUserName = $(this).find('.chat-user-name').text();
                $(this).find('img').removeClass('msg-notification');
                $('.chat-box').removeClass('d-none');
                mainChatInbox.attr('data-inbox', receiverId);
                $('#receiver_id').val(receiverId);
                $.ajax({
                    method: 'get',
                    url: '{{ route("admin.get-messages") }}',
                    data: {
                        receiver_id: receiverId
                    },
                    beforeSend: function() {
                        mainChatInbox.html("");
                        // set chat inbox title
                        $('#chat-inbox-title').text(`Chat With ${chatUserName}`)
                    },
                    success: function(response) {

                        $.each(response, function(index, value) {
                            if(value.sender_id == USER.id) {
                                var message = `
                                <div class="chat-item chat-right" style=""><img style="height: 50px;
                                 object-fit: cover;" src="${USER.image}"><div class="chat-details"><div class="chat-text">${value.message}</div><div class="chat-time">${formatDateTime(value.created_at)}</div></div></div>
                                `
                            }else {
                                var message = `
                                <div class="chat-item chat-left" style=""><img src="${receiverImage}"><div class="chat-details"><div class="chat-text">${value.message}</div><div class="chat-time">${formatDateTime(value.created_at)}</div></div></div>
                                `
                            }

                            mainChatInbox.append(message);
                        });

                        // scroll to bottom
                        scrollTobottom();
                    },
                    error: function(xhr, status, error) {

                    },
                    complete: function() {

                    }
                })
            })


            $('#message-form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let messageData = $('.message-box').val();

                var formSubmitting = false;

                if(formSubmitting || messageData === "" ) {
                    return;
                }

                // set message in inbox
                let message = `
                <div class="chat-item chat-right" style=""><img style="height: 50px;
                object-fit: cover;" src="${USER.image}"><div class="chat-details"><div class="chat-text">${messageData}</div><div class="chat-time">10:53</div></div></div>
                `
                mainChatInbox.append(message);
                $('.message-box').val('');
                scrollTobottom()

                $.ajax({
                    method: 'POST',
                    url: '{{ route("admin.send-message") }}',
                    data: formData,
                    beforeSend: function() {
                        $('.send-button').prop('disabled', true);
                        formSubmitting = true;
                    },
                    success: function(response) {
                    },
                    error: function(xhr, status, error) {
                       toastr.error(xhr.responseJSON.message);
                       $('.send-button').prop('disabled', false);
                       formSubmitting = false;
                    },
                    complete: function() {
                        $('.send-button').prop('disabled', false);
                        formSubmitting = false;
                    }
                })
            })
        })
    </script>
@endpush --}}




{{-- 
@extends('backend.admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Messages</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Chat Box</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-3">
                <div class="card" style="height: 70vh;">
                    <div class="card-header">
                        <h4>Who's Online?</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($chatUsers as $chatUser)
                                @php
                                    $unseenMessages = \App\Models\Chat::where([
                                        'sender_id' => $chatUser->senderProfile->id,
                                        'receiver_id' => auth()->user()->id,
                                        'seen' => 0
                                    ])->exists();
                                @endphp
                                <li class="media chat-user-profile" data-id="{{ $chatUser->senderProfile->id }}">
                                    <img alt="image" class="mr-3 rounded-circle {{ $unseenMessages ? 'msg-notification' : '' }}" width="50" src="{{ asset($chatUser->senderProfile->image) }}">
                                    <div class="media-body">
                                        <div class="mt-0 mb-1 font-weight-bold chat-user-name">{{ $chatUser->senderProfile->name }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card chat-box d-none" id="mychatbox" style="height: 70vh;">
                    <div class="card-header">
                        <h4 id="chat-inbox-title">Chat with <span id="receiver-name"></span></h4>
                    </div>
                    <div class="card-body chat-content" data-inbox="">

                    </div>
                    <div class="card-footer chat-form">
                        <form id="message-form">
                            @csrf
                            <input type="text" class="form-control message-box" placeholder="Type a message" name="message">
                            <input type="hidden" name="receiver_id" value="" id="receiver_id">
                            <button class="btn btn-primary">
                                <i class="far fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    const USER = {
        id: "{{ auth()->user()->id }}",
        name: "{{ auth()->user()->name }}",
        image: "{{ asset(auth()->user()->image) }}"
    };

    const mainChatInbox = $('.chat-content');

    function formatDateTime(dateTimeString) {
        const options = {
            year: 'numeric',
            month: 'short',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
        };
        const formatedDateTime = new Intl.DateTimeFormat('en-US', options).format(new Date(dateTimeString));
        return formatedDateTime;
    }

    function scrollToBottom() {
        mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
    }

    $(document).ready(function() {
        $('.chat-user-profile').on('click', function() {
            let receiverId = $(this).data('id');
            let receiverImage = $(this).find('img').attr('src');
            let chatUserName = $(this).find('.chat-user-name').text();
            $(this).find('img').removeClass('msg-notification');
            $('.chat-box').removeClass('d-none');
            mainChatInbox.attr('data-inbox', receiverId);
            $('#receiver_id').val(receiverId);
            $('#receiver-name').text(chatUserName);

            $.ajax({
                method: 'GET',
                url: '{{ route("admin.get-messages") }}',
                data: {
                    receiver_id: receiverId
                },
                beforeSend: function() {
                    mainChatInbox.html("");
                },
                success: function(response) {
                    $.each(response, function(index, value) {
                        if (value.sender_id == USER.id) {
                            var message = `
                                <div class="chat-item chat-right">
                                    <img src="${USER.image}" style="height: 50px; object-fit: cover;">
                                    <div class="chat-details">
                                        <div class="chat-text">${value.message}</div>
                                        <div class="chat-time">${formatDateTime(value.created_at)}</div>
                                    </div>
                                </div>
                            `;
                        } else {
                            var message = `
                                <div class="chat-item chat-left">
                                    <img src="${receiverImage}" style="height: 50px; object-fit: cover;">
                                    <div class="chat-details">
                                        <div class="chat-text">${value.message}</div>
                                        <div class="chat-time">${formatDateTime(value.created_at)}</div>
                                    </div>
                                </div>
                            `;
                        }
                        mainChatInbox.append(message);
                    });
                    scrollToBottom();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#message-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            let messageData = $('.message-box').val();

            if (messageData === "") {
                return;
            }

            // إضافة الرسالة إلى الواجهة مباشرة
            let message = `
                <div class="chat-item chat-right">
                    <img src="${USER.image}" style="height: 50px; object-fit: cover;">
                    <div class="chat-details">
                        <div class="chat-text">${messageData}</div>
                        <div class="chat-time">${formatDateTime(new Date())}</div>
                    </div>
                </div>
            `;
            mainChatInbox.append(message);
            $('.message-box').val('');
            scrollToBottom();

            // إرسال الرسالة عبر AJAX
            $.ajax({
                method: 'POST',
                url: '{{ route("admin.send-message") }}',
                data: formData,
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endpush --}}






{{-- 
@extends('backend.admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>المحادثات</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="#">المكونات</a></div>
                <div class="breadcrumb-item">صندوق الدردشة</div>
            </div>
            <button id="theme-toggle" class="btn btn-secondary">
                <i class="fas fa-moon"></i>
            </button>
        </div>

        <div class="section-body">
            <div class="row">
                <!-- قائمة المستخدمين -->
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4>المستخدمون المتصلون</h4>
                        </div>
                        <div class="card-body p-2">
                            <ul class="list-group list-group-flush">
                                @foreach ($chatUsers as $chatUser)
                                    @php
                                        $unseenMessages = \App\Models\Chat::where([
                                            'sender_id' => $chatUser->senderProfile->id,
                                            'receiver_id' => auth()->user()->id,
                                            'seen' => 0,
                                        ])->exists();
                                    @endphp
                                    <li class="list-group-item d-flex align-items-center chat-user-profile"
                                        data-id="{{ $chatUser->senderProfile->id }}" style="cursor: pointer;">
                                        <img alt="image"
                                            class="rounded-circle {{ $unseenMessages ? 'msg-notification' : '' }}"
                                            width="40" height="40"
                                            src="{{ asset($chatUser->senderProfile->image) }}">
                                        <span
                                            class="ml-3 font-weight-bold chat-user-name">{{ $chatUser->senderProfile->name }}</span>
                                        @if ($unseenMessages)
                                            <span class="badge badge-danger ml-auto">جديد</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- نافذة المحادثة -->
                <div class="col-md-9">
                    <div class="card chat-box d-none" id="mychatbox">
                        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                            <h4 class="m-0">الدردشة مع <span id="receiver-name"></span></h4>
                            <button class="btn btn-sm btn-light" onclick="$('.chat-box').addClass('d-none')">إغلاق</button>
                        </div>
                        <div class="card-body chat-content overflow-auto" data-inbox=""
                            style="height: 60vh; background: #f9f9f9; border-radius: 5px;">
                        </div>
                        <div class="card-footer bg-light">
                            <form id="message-form" class="d-flex align-items-center">
                                @csrf
                                <input type="text" class="form-control message-box mr-2" placeholder="اكتب رسالة..."
                                    name="message">
                                <input type="hidden" name="receiver_id" value="" id="receiver_id">
                                <button class="btn btn-primary">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        // const USER = {
        //     id: "{{ auth()->user()->id }}",
        //     name: "{{ auth()->user()->name }}",
        //     image: "{{ asset(auth()->user()->image) }}"
        // };

        // const mainChatInbox = $('.chat-content');

        // function formatDateTime(dateTimeString) {
        //     const options = {
        //         year: 'numeric',
        //         month: 'short',
        //         day: '2-digit',
        //         hour: '2-digit',
        //         minute: '2-digit'
        //     };
        //     return new Intl.DateTimeFormat('ar-SA', options).format(new Date(dateTimeString));
        // }

        // function scrollToBottom() {
        //     mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
        // }

        // $(document).ready(function() {
        //     $('.chat-user-profile').on('click', function() {
        //         let receiverId = $(this).data('id');
        //         let receiverImage = $(this).find('img').attr('src');
        //         let chatUserName = $(this).find('.chat-user-name').text();
        //         $(this).find('img').removeClass('msg-notification');

        //         $('.chat-box').removeClass('d-none');
        //         mainChatInbox.attr('data-inbox', receiverId);
        //         $('#receiver_id').val(receiverId);
        //         $('#receiver-name').text(chatUserName);

        //         $.ajax({
        //             method: 'GET',
        //             url: '{{ route('admin.get-messages') }}',
        //             data: {
        //                 receiver_id: receiverId
        //             },
        //             beforeSend: function() {
        //                 mainChatInbox.html("");
        //             },
        //             success: function(response) {
        //                 $.each(response, function(index, value) {
        //                     let message = `
    //                     <div class="chat-item ${value.sender_id == USER.id ? 'chat-right' : 'chat-left'}">
    //                         <img src="${value.sender_id == USER.id ? USER.image : receiverImage}" class="rounded-circle" width="40" height="40">
    //                         <div class="chat-details">
    //                             <div class="chat-text p-2 rounded bg-${value.sender_id == USER.id ? 'primary text-white' : 'light'}">
    //                                 ${value.message}
    //                             </div>
    //                             <div class="chat-time small text-muted">${formatDateTime(value.created_at)}</div>
    //                         </div>
    //                     </div>
    //                 `;
        //                     mainChatInbox.append(message);
        //                 });
        //                 scrollToBottom();
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(error);
        //             }
        //         });
        //     });

        //     $('#message-form').on('submit', function(e) {
        //         e.preventDefault();
        //         let formData = $(this).serialize();
        //         let messageData = $('.message-box').val();

        //         if (messageData.trim() === "") return;

        //         let message = `
    //         <div class="chat-item chat-right">
    //             <img src="${USER.image}" class="rounded-circle" width="40" height="40">
    //             <div class="chat-details">
    //                 <div class="chat-text p-2 rounded bg-primary text-white">${messageData}</div>
    //                 <div class="chat-time small text-muted">${formatDateTime(new Date())}</div>
    //             </div>
    //         </div>
    //     `;
        //         mainChatInbox.append(message);
        //         $('.message-box').val('');
        //         scrollToBottom();

        //         $.ajax({
        //             method: 'POST',
        //             url: '{{ route('admin.send-message') }}',
        //             data: formData,
        //             success: function(response) {
        //                 console.log(response);
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(error);
        //             }
        //         });
        //     });
        // });

        const USER = {
            id: "{{ auth()->user()->id }}",
            name: "{{ auth()->user()->name }}",
            image: "{{ asset(auth()->user()->image) }}"
        };

        const mainChatInbox = $('.chat-content');

        function formatDateTime(dateTimeString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit'
            };
            return new Intl.DateTimeFormat('ar-SA', options).format(new Date(dateTimeString));
        }

        function scrollToBottom() {
            mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
        }

        $(document).ready(function() {
            $('.chat-user-profile').on('click', function() {
                let receiverId = $(this).data('id');
                let receiverImage = $(this).find('img').attr('src');
                let chatUserName = $(this).find('.chat-user-name').text();
                $(this).find('img').removeClass('msg-notification');

                $('.chat-box').removeClass('d-none');
                mainChatInbox.attr('data-inbox', receiverId);
                $('#receiver_id').val(receiverId);
                $('#receiver-name').text(chatUserName);

                $.ajax({
                    method: 'GET',
                    url: '{{ route('admin.get-messages') }}',
                    data: {
                        receiver_id: receiverId
                    },
                    beforeSend: function() {
                        mainChatInbox.html("");
                    },
                    success: function(response) {
                        $.each(response, function(index, value) {
                            let message = `
                    <div class="chat-item ${value.sender_id == USER.id ? 'chat-right' : 'chat-left'}">
                        <img src="${value.sender_id == USER.id ? USER.image : receiverImage}" class="rounded-circle" width="40" height="40">
                        <div class="chat-details">
                            <div class="chat-text p-2 rounded bg-${value.sender_id == USER.id ? 'primary text-white' : 'light'}">
                                ${value.message}
                            </div>
                            <div class="chat-time small text-muted">${formatDateTime(value.created_at)}</div>
                        </div>
                    </div>
                `;
                            mainChatInbox.append(message);
                        });
                        scrollToBottom();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#message-form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let messageData = $('.message-box').val();

                if (messageData.trim() === "") return;

                let message = `
        <div class="chat-item chat-right">
            <img src="${USER.image}" class="rounded-circle" width="40" height="40">
            <div class="chat-details">
                <div class="chat-text p-2 rounded bg-primary text-white">${messageData}</div>
                <div class="chat-time small text-muted">${formatDateTime(new Date())}</div>
            </div>
        </div>
    `;
                mainChatInbox.append(message);
                $('.message-box').val('');
                scrollToBottom();

                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.send-message') }}',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush --}}





@php
    $chatUsers = [
        (object) [
            'senderProfile' => (object) [
                'id' => 1,
                'name' => 'أحمد',
                'image' => 'image/1.jpg',
            ],
        ],
        (object) [
            'senderProfile' => (object) [
                'id' => 2,
                'name' => 'محمد',
                'image' => 'image/2.jpg',
            ],
        ],
        (object) [
            'senderProfile' => (object) [
                'id' => 3,
                'name' => 'فاطمة',
                'image' => 'image/3.jpg',
            ],
        ],
    ];
@endphp



@php
    $messages = [
        (object) [
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'مرحبًا، كيف حالك؟',
            'created_at' => now(),
        ],
        (object) [
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'أنا بخير، شكرًا!',
            'created_at' => now(),
        ],
        (object) [
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'هل لديك أي أخبار جديدة؟',
            'created_at' => now(),
        ],
    ];
@endphp




@extends('backend.admin.layouts.master')

@section('content')



    <section class="section">
        <div class="section-header">
            <h1>المحادثات</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="#">المكونات</a></div>
                <div class="breadcrumb-item">صندوق الدردشة</div>
            </div>
            <button id="theme-toggle" class="btn btn-secondary">
                <i class="fas fa-moon"></i>
            </button>
        </div>

        <div class="section-body">
            <div class="row">
                <!-- قائمة المستخدمين -->
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4>المستخدمون المتصلون</h4>
                        </div>
                        <div class="card-body p-2">
                            <ul class="list-group list-group-flush">
                                @foreach ($chatUsers as $chatUser)
                                    @php
                                        $unseenMessages = \App\Models\Chat::where([
                                            'sender_id' => $chatUser->senderProfile->id,
                                            'receiver_id' => auth()->user()->id,
                                            'seen' => 0,
                                        ])->exists();
                                    @endphp
                                    <li class="list-group-item chat-user-profile"
                                        data-id="{{ $chatUser->senderProfile->id }}" style="cursor: pointer;">
                                        <img alt="image"
                                            class="rounded-circle {{ $unseenMessages ? 'msg-notification' : '' }}"
                                            src="{{ asset($chatUser->senderProfile->image) }}">
                                        <span class="chat-user-name">{{ $chatUser->senderProfile->name }}</span>
                                        @if ($unseenMessages)
                                            <span class="badge badge-danger">جديد</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- نافذة المحادثة -->
                <div class="col-md-9">
                    <div class="card chat-box d-none" id="mychatbox">
                        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                            <h4 class="m-0">الدردشة مع <span id="receiver-name"></span></h4>
                            <button class="btn btn-sm btn-light" onclick="$('.chat-box').addClass('d-none')">إغلاق</button>
                        </div>
                        <div class="card-body chat-content overflow-auto" data-inbox=""
                            style="height: 60vh; background: #f9f9f9; border-radius: 5px;">
                            @foreach ($messages as $message)
                                <div
                                    class="chat-item {{ $message->sender_id == auth()->user()->id ? 'chat-right' : 'chat-left' }}">
                                    <img src="{{ asset($message->sender_id == auth()->user()->id ? auth()->user()->image : $chatUsers[$message->sender_id - 1]->senderProfile->image) }}"
                                        class="rounded-circle" width="40" height="40">
                                    <div class="chat-details">
                                        <div
                                            class="chat-text p-2 rounded {{ $message->sender_id == auth()->user()->id ? 'bg-primary text-white' : 'bg-light' }}">
                                            {{ $message->message }}
                                        </div>
                                        <div class="chat-time small text-muted">{{ $message->created_at->format('h:i A') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-footer bg-light">
                            <form id="message-form" class="d-flex align-items-center">
                                @csrf
                                <input type="text" class="form-control message-box mr-2" placeholder="اكتب رسالة..."
                                    name="message">
                                <input type="hidden" name="receiver_id" value="" id="receiver_id">
                                <button class="btn btn-primary">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    {{-- <script>
        const USER = {
            id: "{{ auth()->user()->id }}",
            name: "{{ auth()->user()->name }}",
            image: "{{ asset(auth()->user()->image) }}"
        };

        const mainChatInbox = $('.chat-content');

        function formatDateTime(dateTimeString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit'
            };
            return new Intl.DateTimeFormat('ar-SA', options).format(new Date(dateTimeString));
        }

        function scrollToBottom() {
            mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
        }

        $(document).ready(function() {
            $('.chat-user-profile').on('click', function() {
                let receiverId = $(this).data('id');
                let receiverImage = $(this).find('img').attr('src');
                let chatUserName = $(this).find('.chat-user-name').text();
                $(this).find('img').removeClass('msg-notification');

                $('.chat-box').removeClass('d-none');
                mainChatInbox.attr('data-inbox', receiverId);
                $('#receiver_id').val(receiverId);
                $('#receiver-name').text(chatUserName);

                $.ajax({
                    method: 'GET',
                    url: '{{ route('admin.get-messages') }}',
                    data: {
                        receiver_id: receiverId
                    },
                    beforeSend: function() {
                        mainChatInbox.html("");
                    },
                    success: function(response) {
                        $.each(response, function(index, value) {
                            let message = `
                    <div class="chat-item ${value.sender_id == USER.id ? 'chat-right' : 'chat-left'}">
                        <img src="${value.sender_id == USER.id ? USER.image : receiverImage}" class="rounded-circle" width="40" height="40">
                        <div class="chat-details">
                            <div class="chat-text p-2 rounded bg-${value.sender_id == USER.id ? 'primary text-white' : 'light'}">
                                ${value.message}
                            </div>
                            <div class="chat-time small text-muted">${formatDateTime(value.created_at)}</div>
                        </div>
                    </div>
                `;
                            mainChatInbox.append(message);
                        });
                        scrollToBottom();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#message-form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let messageData = $('.message-box').val();

                if (messageData.trim() === "") return;

                let message = `
        <div class="chat-item chat-right">
            <img src="${USER.image}" class="rounded-circle" width="40" height="40">
            <div class="chat-details">
                <div class="chat-text p-2 rounded bg-primary text-white">${messageData}</div>
                <div class="chat-time small text-muted">${formatDateTime(new Date())}</div>
            </div>
        </div>
    `;
                mainChatInbox.append(message);
                $('.message-box').val('');
                scrollToBottom();

                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.send-message') }}',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script> --}}


    {{-- <script>
        const USER = {
            id: "{{ auth()->user()->id }}",
            name: "{{ auth()->user()->name }}",
            image: "{{ asset(auth()->user()->image) }}"
        };

        const mainChatInbox = $('.chat-content');

        function formatDateTime(dateTimeString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit'
            };
            return new Intl.DateTimeFormat('ar-SA', options).format(new Date(dateTimeString));
        }

        function scrollToBottom() {
            mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
        }

        $(document).ready(function() {
            $('.chat-user-profile').on('click', function() {
                let receiverId = $(this).data('id');
                let receiverImage = $(this).find('img').attr('src');
                let chatUserName = $(this).find('.chat-user-name').text();
                $(this).find('img').removeClass('msg-notification');

                $('.chat-box').removeClass('d-none');
                mainChatInbox.attr('data-inbox', receiverId);
                $('#receiver_id').val(receiverId);
                $('#receiver-name').text(chatUserName);

                // عرض الرسائل الوهمية
                mainChatInbox.html("");
                @foreach ($messages as $message)
                    let message = `
                <div class="chat-item ${ $message->sender_id == auth()->user()->id ? 'chat-right' : 'chat-left' }">
                    <img src="${ $message->sender_id == auth()->user()->id ? USER.image : '{{ asset($chatUsers[$message->sender_id - 1]->senderProfile->image) }}' }" class="rounded-circle" width="40" height="40">
                    <div class="chat-details">
                        <div class="chat-text p-2 rounded ${ $message->sender_id == auth()->user()->id ? 'bg-primary text-white' : 'bg-light' }">
                            {{ $message->message }}
                        </div>
                        <div class="chat-time small text-muted">{{ $message->created_at->format('h:i A') }}</div>
                    </div>
                </div>
            `;
                    mainChatInbox.append(message);
                @endforeach
                scrollToBottom();
            });

            $('#message-form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let messageData = $('.message-box').val();

                if (messageData.trim() === "") return;

                let message = `
            <div class="chat-item chat-right">
                <img src="${USER.image}" class="rounded-circle" width="40" height="40">
                <div class="chat-details">
                    <div class="chat-text p-2 rounded bg-primary text-white">${messageData}</div>
                    <div class="chat-time small text-muted">${formatDateTime(new Date())}</div>
                </div>
            </div>
        `;
                mainChatInbox.append(message);
                $('.message-box').val('');
                scrollToBottom();

                // إرسال الرسالة عبر AJAX (يمكنك إضافة الكود هنا)
            });
        });
    </script> --}}

    <script>
        const USER = {
            id: "{{ auth()->user()->id }}",
            name: "{{ auth()->user()->name }}",
            image: "{{ asset(auth()->user()->image) }}"
        };

        const mainChatInbox = $('.chat-content');

        function formatDateTime(dateTimeString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit'
            };
            return new Intl.DateTimeFormat('ar-SA', options).format(new Date(dateTimeString));
        }

        function scrollToBottom() {
            mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
        }

        $(document).ready(function() {
            $('.chat-user-profile').on('click', function() {
                let receiverId = $(this).data('id');
                let receiverImage = $(this).find('img').attr('src');
                let chatUserName = $(this).find('.chat-user-name').text();
                $(this).find('img').removeClass('msg-notification');

                $('.chat-box').removeClass('d-none');
                mainChatInbox.attr('data-inbox', receiverId);
                $('#receiver_id').val(receiverId);
                $('#receiver-name').text(chatUserName);

                // عرض الرسائل الوهمية
                mainChatInbox.html("");
                @foreach ($messages as $message)
                    let message = `
                <div class="chat-item ${ $message->sender_id == auth()->user()->id ? 'chat-right' : 'chat-left' }">
                    <img src="${ $message->sender_id == auth()->user()->id ? USER.image : '{{ asset($chatUsers[$message->sender_id - 1]->senderProfile->image) }}' }" class="rounded-circle" width="40" height="40">
                    <div class="chat-details">
                        <div class="chat-text p-2 rounded ${ $message->sender_id == auth()->user()->id ? 'bg-primary text-white' : 'bg-light' }">
                            {{ $message->message }}
                        </div>
                        <div class="chat-time small text-muted">{{ $message->created_at->format('h:i A') }}</div>
                    </div>
                </div>
            `;
                    mainChatInbox.append(message);
                @endforeach
                scrollToBottom();
            });

            $('#message-form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let messageData = $('.message-box').val();

                if (messageData.trim() === "") return;

                let message = `
            <div class="chat-item chat-right">
                <img src="${USER.image}" class="rounded-circle" width="40" height="40">
                <div class="chat-details">
                    <div class="chat-text p-2 rounded bg-primary text-white">${messageData}</div>
                    <div class="chat-time small text-muted">${formatDateTime(new Date())}</div>
                </div>
            </div>
        `;
                mainChatInbox.append(message);
                $('.message-box').val('');
                scrollToBottom();

                // إرسال الرسالة عبر AJAX (يمكنك إضافة الكود هنا)
            });
        });
    </script>
@endpush
