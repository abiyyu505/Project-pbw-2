@extends('layouts.app')

@section('title', 'Tambah Kamar')

@section('content')

<link rel="stylesheet" href="{{ asset('css/create-room.css') }}">

<div class="create-room-page">
    <div class="room-card">
        <h3 class="mb-3">Tambah Kamar</h3>

        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Nomor Kamar</label>
            <input type="text" name="room_number" class="form-control mb-3">

            <label>Tipe Kamar</label>
            <select name="room_type_id" class="form-control mb-3">
                @foreach ($types as $t)
                    <option value="{{ $t->id }}">{{ $t->type_name }}</option>
                @endforeach
            </select>

            <label>Harga / Malam</label>
            <input type="number" name="price_per_night" class="form-control mb-3">

            <label>Status</label>
            <select name="status" class="form-control mb-3">
                <option value="available">Available</option>
                <option value="booked">Booked</option>
                <option value="maintenance">Maintenance</option>
            </select>

            <label>Deskripsi</label>
            <textarea name="description" class="form-control mb-3"></textarea>

            <label>Foto Kamar</label>
            <input type="file" name="image" class="form-control mb-3">

            <button class="btn btn-room">Simpan</button>
        </form>
    </div>
</div>
@endsection
