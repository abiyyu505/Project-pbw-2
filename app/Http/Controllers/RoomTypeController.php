<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $types = RoomType::all();
        return view('room_types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('room_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'type_name' => 'required',
            'max_guest' => 'required|integer',
            'facilities' => 'nullable'
        ]);

        RoomType::create($request->all());

        return redirect()->route('room-types.index')->with('success', 'Room type created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(room_types $room_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(room_types $room_types)
    {
        //
        return view('room_types.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, room_types $room_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(room_types $room_types)
    {
        //
    }
}
