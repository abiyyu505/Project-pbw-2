<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = ['Standard', 'Deluxe', 'Suite', 'Family Room', 'Executive'];
        // 'room_type' => fake()->randomElement($roomTypes),
        $data = [];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'room_type' => fake()->randomElement($roomTypes),
                'hotel_id' => fake()->numberBetween(1, 50),
                'price' => fake()->randomFloat(2, 100000, 1000000),
                'capacity' => fake()->numberBetween(1, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Room::insert($data);
    }
}
