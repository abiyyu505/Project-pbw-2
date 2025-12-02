@extends('layouts.app')

@section('title', 'Tambah Tipe Kamar')

@section('content')

<link rel="stylesheet" href="{{ asset('css/create-room-type.css') }}">

<div class="create-room-type-page">
    <div class="room-type-card">
        <h3 class="mb-3">Tambah Tipe Kamar</h3>

        <form action="{{ route('room-types.store') }}" method="POST">
            @csrf

            <label>Nama Tipe</label>
            <input type="text" name="type_name" class="form-control mb-3">

            <label>Maksimal Tamu</label>
            <input type="number" name="max_guest" class="form-control mb-3">

            <label>Fasilitas</label>
            <textarea name="facilities" class="form-control mb-3"></textarea>

            <button class="btn btn-room-type">Simpan</button>
        </form>
    </div>
</div>
@endsection
