<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['state' => 'Aceh', 'city' => 'Banda Aceh', 'country' => 'Indonesia'],
            ['state' => 'Sumatera Utara', 'city' => 'Medan', 'country' => 'Indonesia'],
            ['state' => 'Sumatera Barat', 'city' => 'Padang', 'country' => 'Indonesia'],
            ['state' => 'Riau', 'city' => 'Pekanbaru', 'country' => 'Indonesia'],
            ['state' => 'Kepulauan Riau', 'city' => 'Batam', 'country' => 'Indonesia'],
            ['state' => 'Jambi', 'city' => 'Jambi', 'country' => 'Indonesia'],
            ['state' => 'Sumatera Selatan', 'city' => 'Palembang', 'country' => 'Indonesia'],
            ['state' => 'Bangka Belitung', 'city' => 'Pangkal Pinang', 'country' => 'Indonesia'],
            ['state' => 'Bengkulu', 'city' => 'Bengkulu', 'country' => 'Indonesia'],

            ['state' => 'DKI Jakarta', 'city' => 'Jakarta', 'country' => 'Indonesia'],
            ['state' => 'Jawa Barat', 'city' => 'Bandung', 'country' => 'Indonesia'],
            ['state' => 'Banten', 'city' => 'Serang', 'country' => 'Indonesia'],
            ['state' => 'Jawa Tengah', 'city' => 'Semarang', 'country' => 'Indonesia'],
            ['state' => 'DI Yogyakarta', 'city' => 'Yogyakarta', 'country' => 'Indonesia'],
            ['state' => 'Jawa Timur', 'city' => 'Surabaya', 'country' => 'Indonesia'],

            ['state' => 'Bali', 'city' => 'Denpasar', 'country' => 'Indonesia'],
            ['state' => 'Nusa Tenggara Barat', 'city' => 'Mataram', 'country' => 'Indonesia'],
            ['state' => 'Nusa Tenggara Timur', 'city' => 'Kupang', 'country' => 'Indonesia'],

            ['state' => 'Kalimantan Barat', 'city' => 'Pontianak', 'country' => 'Indonesia'],
            ['state' => 'Kalimantan Tengah', 'city' => 'Palangkaraya', 'country' => 'Indonesia'],
            ['state' => 'Kalimantan Selatan', 'city' => 'Banjarmasin', 'country' => 'Indonesia'],
            ['state' => 'Kalimantan Timur', 'city' => 'Samarinda', 'country' => 'Indonesia'],
            ['state' => 'Kalimantan Utara', 'city' => 'Tanjung Selor', 'country' => 'Indonesia'],

            ['state' => 'Sulawesi Utara', 'city' => 'Manado', 'country' => 'Indonesia'],
            ['state' => 'Sulawesi Tengah', 'city' => 'Palu', 'country' => 'Indonesia'],
            ['state' => 'Sulawesi Selatan', 'city' => 'Makassar', 'country' => 'Indonesia'],
            ['state' => 'Sulawesi Tenggara', 'city' => 'Kendari', 'country' => 'Indonesia'],
            ['state' => 'Gorontalo', 'city' => 'Gorontalo', 'country' => 'Indonesia'],
            ['state' => 'Sulawesi Barat', 'city' => 'Mamuju', 'country' => 'Indonesia'],

            ['state' => 'Maluku', 'city' => 'Ambon', 'country' => 'Indonesia'],
            ['state' => 'Maluku Utara', 'city' => 'Ternate', 'country' => 'Indonesia'],
            ['state' => 'Papua', 'city' => 'Jayapura', 'country' => 'Indonesia'],
            ['state' => 'Papua Barat', 'city' => 'Manokwari', 'country' => 'Indonesia'],
            ['state' => 'Papua Selatan', 'city' => 'Merauke', 'country' => 'Indonesia'],
            ['state' => 'Papua Pegunungan', 'city' => 'Wamena', 'country' => 'Indonesia'],
            ['state' => 'Papua Tengah', 'city' => 'Nabire', 'country' => 'Indonesia'],
        ];

        Location::insert($locations);
    }
}
