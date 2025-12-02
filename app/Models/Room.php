<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'room_number',
        'room_type_id',
        'price_per_night',
        'status',
        'description',
        'image',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
