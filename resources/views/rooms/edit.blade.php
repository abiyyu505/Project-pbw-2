@extends('layouts.app')

@section('title', 'Edit Room')

@section('content')

<link rel="stylesheet" href="{{ asset('css/edit-room.css') }}">

<div class="edit-room-page">
    <div class="edit-room-card">

        <h3 class="edit-title mb-3">Edit Room</h3>

        <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>No Kamar</label>
            <input type="text" name="room_number" class="form-control mb-3" value="{{ $room->room_number }}">

            <label>Tipe</label>
            <select name="room_type_id" class="form-control mb-3">
                @foreach ($types as $t)
                    <option value="{{ $t->id }}" {{ $room->room_type_id == $t->id ? 'selected' : '' }}>
                        {{ $t->type_name }}
                    </option>
                @endforeach
            </select>

            <label>Harga / Malam</label>
            <input type="number" name="price_per_night" class="form-control mb-3" value="{{ $room->price_per_night }}">

            <label>Status</label>
            <select name="status" class="form-control mb-3">
                <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Booked</option>
                <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>

            <label>Deskripsi</label>
            <textarea name="description" class="form-control mb-3">{{ $room->description }}</textarea>

            <label>Foto Kamar</label>
            <input type="file" name="image" class="form-control mb-3">

            @if ($room->image)
                <img src="{{ asset('storage/'.$room->image) }}" height="80" class="preview-img">
            @endif

            <br><br>

            <button class="btn btn-update">Update</button>
            <a href="{{ route('rooms.index') }}" class="btn btn-back">Kembali</a>
        </form>

    </div>
</div>
@endsection
