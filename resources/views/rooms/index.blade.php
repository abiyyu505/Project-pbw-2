@extends('layouts.app')

@section('title', 'Rooms')

@section('content')

<link rel="stylesheet" href="{{ asset('css/index-room.css') }}">

<div class="index-room-page">
    <div class="index-card">

        <h3 class="index-title mb-3">Daftar Kamar</h3>

        <a href="{{ route('rooms.create') }}" class="btn btn-add mb-3">Tambah Kamar</a>

        <table class="table table-bordered index-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>No Kamar</th>
                    <th>Tipe</th>
                    <th>Harga / Malam</th>
                    <th>Status</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->room_number }}</td>
                    <td>{{ $r->roomType->type_name }}</td>
                    <td>{{ $r->price_per_night }}</td>
                    <td>{{ $r->status }}</td>
                    <td>
                        @if ($r->image)
                            <img src="{{ asset('storage/' . $r->image) }}" height="50">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('rooms.edit', $r->id) }}" class="btn btn-sm btn-edit">Edit</a>

                        <form action="{{ route('rooms.destroy', $r->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-delete">Hapus</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
