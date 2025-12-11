<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Hotel;

class UserPageController extends Controller
{
    public function home(){
        $locations = Location::all();
        $hotels = Hotel::all();
        return view('user.main', compact('locations', 'hotels'));
    }

    public function search(Request $request){
        $location = $request->location;
        $roomType = $request->room_type;
        
        $result = Hotel::with(['location', 'rooms'])
            ->where(function ($q) use ($location, $roomType) {
                if ($location) {
                    $q->orWhereHas('location', function ($loc) use ($location) {
                        $loc->where('city', 'LIKE', "%$location%");
                    });
                }

                if ($roomType) {
                    $q->orWhereHas('rooms', function ($room) use ($roomType) {
                        $room->where('room_type', 'LIKE', "%$roomType%");
                    });
                }
            })
            ->get();

        return response()->json($result);
    }
}
