<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Room - {{ $room->code }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #f1f2f6
        }

        .chat-online {
            color: #34ce57
        }

        .chat-offline {
            color: #e4606d
        }

        .chat-messages {
            display: flex;
            flex-direction: column;
            max-height: 750px;
            overflow-y: scroll
        }

        .chat-message-left,
        .chat-message-right {
            display: flex;
            flex-shrink: 0
        }

        .chat-message-left {
            margin-right: auto
        }

        .chat-message-right {
            flex-direction: row-reverse;
            margin-left: auto
        }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .flex-grow-0 {
            flex-grow: 0 !important;
        }

        .border-top {
            border-top: 1px solid #dee2e6 !important;
        }

        .chat-room{
            display: none;
        }

        .qr{
            position: absolute;
            display: none;
            bottom: 0;
            left:10px
        }
    </style>
</head>

<body>

    <div class="container name-area">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-body">
                        <h5>Selamat Datang</h5>
                        <div class="form-group">
                            <label class="form-label" for=""><b>Nama</b></label>
                            <input type="text" class="form-control name" placeholder="Misalnya Andi...">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary float-right submit-name">
                                Selanjutnya
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="qr p-1">
        <div class="card">
            <div class="card-body">
                <center>
                    <h5><b>QR Code Room</b></h5>
                </center>
                {!! QrCode::size(200)->generate(url('/room/chat/'.$room->code)); !!}
                <center>
                    <small>*Scan untuk memasuki room chat</small>
                </center>
            </div>
        </div>
    </div>
    <main class="content chat-room">
        <div class="container p-0">
            <div class="card">
                <div class="row g-0">
                    <div class="col-12">
                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
                                <div class="position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                        <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                      </svg>
                                </div>
                                <div class="flex-grow-1 pl-3">
                                    <strong>{{ $room->code }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div class="chat-messages p-4">
                                @foreach ($model as $item)
                                <div class="chat-message-right pb-4" data-id="{{ $item->id }}">
                                    <div>
                                        <img src="https://www.booksie.com/files/profiles/22/mr-anonymous.png"
                                            class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">{{ date('H:i', strtotime($item->created_at)) }}</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                        <div class="font-weight-bold mb-1">{{ $item->name }}</div>
                                        {{ $item->text }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex-grow-0 py-3 px-4 border-top field">
                            <div class="input-group">
                                <input type="text" class="form-control msg" placeholder="Pesan...">
                                <button class="btn btn-primary send-msg">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        let flag_field = localStorage.getItem('flag-field');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let room_id = "{{ $room->id }}";
        let name = "";

        if (flag_field == "true" || flag_field == true) {
            $('.field').hide();
            $('.chat-room').show();
            $('.name-area').hide();
            $('.qr').show();
            localStorage.removeItem('flag-field');
        }

        $('.submit-name').click(function(){
            name = $('.name').val();
            if (name) {
                $('.chat-room').show();
                $('.name-area').hide();
                let chatMessages = $('.chat-messages');
                chatMessages.scrollTop(chatMessages[0].scrollHeight);
            }
        });

        $('.send-msg').click(function(){
            let msg = $('.msg').val();
            $('.send-msg').html('...');
            $.ajax({
                url : "/api/send-msg",
                type : "POST",
                data : {
                    room_id : room_id,
                    msg : msg,
                    name : name
                },
                success:function(res){
                    $('.msg').val('');
                    $('.send-msg').html('Kirim');
                }
            })
        });

        // autoload
        setInterval(() => {
            $.ajax({
                url : "/api/get-msg",
                type : "POST",
                data : {
                    id : room_id,
                },
                success:function(res){
                    let shouldScroll = false;
                    res.forEach(item => {
                        // Check if the message already exists
                        if (!$(`.chat-message-right[data-id="${item.id}"]`).length) {

                            shouldScroll = true;
                            // Extract and format the hour from created_at
                            let date = new Date(item.created_at);
                            let hours = date.getHours();
                            let minutes = date.getMinutes();
                            hours = hours;
                            minutes = minutes < 10 ? '0'+minutes : minutes;
                            let formattedTime = hours + ':' + minutes;

                            let avatarUrl = `https://www.booksie.com/files/profiles/22/mr-anonymous.png`;

                            // Create the new message element
                            let newMessage = `
                                <div class="chat-message-right pb-4" data-id="${item.id}">
                                    <div>
                                        <img src="${avatarUrl}"
                                            class="rounded-circle mr-1" alt="Avatar" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">${formattedTime}</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                        <div class="font-weight-bold mb-1">${item.name}</div>
                                        ${item.text}
                                    </div>
                                </div>
                            `;

                            // Append the new message
                            $('.chat-messages').append(newMessage);
                        }
                    });
                    if (shouldScroll) {
                        let chatMessages = $('.chat-messages');
                        chatMessages.scrollTop(chatMessages[0].scrollHeight);
                    }
                }
            })

        }, 500);
    </script>
</body>

</html>
