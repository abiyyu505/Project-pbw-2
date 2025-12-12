<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run()
    {
        

        $data = [];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'name' => 'Hotel ' . fake()->company(),
                'description' => fake()->paragraph(2),
                'address' => fake()->address(),
                'location_id' => fake()->numberBetween(1, 25),
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Hotel::insert($data);
    }
}
