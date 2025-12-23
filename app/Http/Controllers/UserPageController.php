<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Hotel;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
{
    public function home(){
        $userId = Auth::id();
        $locations = Location::all();
        $hotels = Hotel::all();
        $bookings_pending = Booking::where('user_id', $userId)->whereIn('status', ['pending', 'paid'])->get();
        $bookings_completed = Booking::where('user_id', $userId)->where('status', 'completed')->get();
        $bookings_canceled = Booking::where('user_id', $userId)->where('status', 'canceled')->get();
        $bookings_history = Booking::where('user_id', $userId)->get();
        return view('user.main', compact('locations', 'hotels', 'bookings_pending', 'bookings_completed', 'bookings_canceled', 'bookings_history'));
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

    public function hotel($id){
        $hotel = Hotel::with('rooms', 'location')->findOrFail($id);
        $priceAvg = $hotel->rooms->avg('price');
        
        return view('user.hotel.detail', compact('hotel', 'priceAvg'));
    }

    public function map($id){
        $userId = Auth::id();

        $hotel = Hotel::with('location')->findOrFail($id);
        $bookings_history = Booking::where('user_id', $userId)->get();
        return view('user.hotel.map', compact('hotel', 'bookings_history'));
    }
}
