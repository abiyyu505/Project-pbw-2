@extends('layouts.app')

@section('title', 'Edit Room Type')

@section('content')

<link rel="stylesheet" href="{{ asset('css/edit-room-type.css') }}">

<div class="edit-room-type-page">
    <div class="edit-room-type-card">

        <h3 class="edit-title mb-3">Edit Room Type</h3>

        <form action="{{ route('room-types.update', $type->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama Tipe</label>
            <input type="text" name="type_name" class="form-control mb-3" value="{{ $type->type_name }}">

            <label>Max Guest</label>
            <input type="number" name="max_guest" class="form-control mb-3" value="{{ $type->max_guest }}">

            <label>Fasilitas</label>
            <textarea name="facilities" class="form-control mb-3">{{ $type->facilities }}</textarea>

            <button class="btn btn-update">Update</button>
            <a href="{{ route('room-types.index') }}" class="btn btn-back">Kembali</a>
        </form>

    </div>
</div>
@endsection
