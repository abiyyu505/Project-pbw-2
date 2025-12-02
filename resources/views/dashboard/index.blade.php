@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h3 class="mb-4">Dashboard</h3>

<div class="row">
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Total Room Types</h5>
                <p class="fs-4">{{ $roomTypeCount }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Total Rooms</h5>
                <p class="fs-4">{{ $roomCount }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
