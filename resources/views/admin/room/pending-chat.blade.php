@extends('layouts.backoffice')
@section('menu-room','active')
@section('content')
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
                        <tr>
                            <td>{{ ($key + 1) }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->text }}</td>
                            <td>
                                <a href="{{ url('/room/approve-chat/'.$item->id) }}" class="btn btn-success"><i class='bx bx-check' ></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
