<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
