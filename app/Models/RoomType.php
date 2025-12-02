<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    //
    protected $fillable = [
        'type_name',
        'max_guest',
        'facilities',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
