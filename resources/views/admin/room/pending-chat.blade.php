@extends('layouts.backoffice')
@section('menu-room','active')
@section('content')
<style>
    .bg-info{
        background-color: #fff5e0 !important;
        animation: blink 1s; /* 1s is the duration, and infinite means it will keep blinking */

    }

    @keyframes blink {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($model as $key => $item)
                        <tr class="row-table" data-id="{{ $item->id }}">
                            <td>{{ ($key + 1) }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->text == "")
                                    <img width="200px" src='{{ asset("$item->image") }}' alt="">
                                    @else
                                    {{ $item->text }}
                                @endif
                            <td>
                                <a href="{{ url('/room/approve-chat/'.$item->id) }}" class="btn btn-primary"><i class='bx bx-check' ></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        let id = "{{ $id }}";
        let approve_link = "{{ url('/room/approve-chat') }}";
        setInterval(() => {
            $.ajax({
                url : "{{ url('/room/pending-chat') }}" + "/" + id,
                type : "GET",
                success:function(res){
                    res.forEach(item => {
                        // Check if the message already exists
                        if (!$(`.row-table[data-id="${item.id}"]`).length) {
                            let final_content = "";
                            if (item.text == "" || item.text == null) {
                                final_content = `<img class="img-chat" src="{{ asset('${item.image}') }}">`;
                            }else{
                                final_content = item.text;
                            }

                            let newMessage = `
                                <tr class="row-table bg-info text-dark" data-id="${item.id}">
                                    <td>${$(`.row-table`).length + 1}</td>
                                    <td>${item.name}</td>
                                    <td>${final_content}</td>
                                    <td>
                                        <a href="${approve_link + "/" + item.id}" class="btn btn-primary"><i class='bx bx-check' ></i></a>
                                    </td>
                                </tr>
                            `;

                            // Append the new message
                            $('tbody').append(newMessage);
                        }
                    });
                }
            })

        }, 500);
    </script>
@endpush
