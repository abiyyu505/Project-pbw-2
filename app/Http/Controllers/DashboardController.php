<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'roomTypeCount' => RoomType::count(),
            'roomCount' => Room::count(),
        ]);
    }
}
