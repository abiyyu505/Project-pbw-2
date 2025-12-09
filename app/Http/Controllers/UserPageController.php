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
        return view('user.home', compact('locations', 'hotels'));
    }
}
