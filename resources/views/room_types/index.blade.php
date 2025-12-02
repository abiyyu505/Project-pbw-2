@extends('layouts.app')

@section('title', 'Tipe Kamar')

@section('content')

<link rel="stylesheet" href="{{ asset('css/index-room-type.css') }}">

<div class="index-room-type-page">
    <div class="index-card">
        <h3 class="index-title mb-3">Daftar Tipe Kamar</h3>

        <a href="{{ route('room-types.create') }}" class="btn btn-add mb-3">+ Tambah Tipe Kamar</a>

        <table class="table table-bordered index-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Tipe</th>
                    <th>Max Guest</th>
                    <th>Fasilitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->type_name }}</td>
                    <td>{{ $t->max_guest }}</td>
                    <td>{{ $t->facilities }}</td>
                    <td>
                        <a href="{{ route('room-types.edit', $t->id) }}" class="btn btn-sm btn-edit">Edit</a>
                        <form action="{{ route('room-types.destroy', $t->id) }}" method="POST" class="d-inline">
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
