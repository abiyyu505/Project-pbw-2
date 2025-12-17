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
            ['state' => 'Aceh', 'city' => 'Banda Aceh', 'country' => 'Indonesia', 'lat' => 5.5483, 'lng' => 95.3238],
            ['state' => 'Sumatera Utara', 'city' => 'Medan', 'country' => 'Indonesia', 'lat' => 3.5952, 'lng' => 98.6722],
            ['state' => 'Sumatera Barat', 'city' => 'Padang', 'country' => 'Indonesia', 'lat' => -0.9492, 'lng' => 100.3543],
            ['state' => 'Riau', 'city' => 'Pekanbaru', 'country' => 'Indonesia', 'lat' => 0.5071, 'lng' => 101.4478],
            ['state' => 'Kepulauan Riau', 'city' => 'Batam', 'country' => 'Indonesia', 'lat' => 1.0456, 'lng' => 104.0305],
            ['state' => 'Jambi', 'city' => 'Jambi', 'country' => 'Indonesia', 'lat' => -1.6101, 'lng' => 103.6131],
            ['state' => 'Sumatera Selatan', 'city' => 'Palembang', 'country' => 'Indonesia', 'lat' => -2.9761, 'lng' => 104.7754],
            ['state' => 'Bangka Belitung', 'city' => 'Pangkal Pinang', 'country' => 'Indonesia', 'lat' => -2.1316, 'lng' => 106.1169],
            ['state' => 'Bengkulu', 'city' => 'Bengkulu', 'country' => 'Indonesia', 'lat' => -3.8004, 'lng' => 102.2655],

            ['state' => 'DKI Jakarta', 'city' => 'Jakarta', 'country' => 'Indonesia', 'lat' => -6.2088, 'lng' => 106.8456],
            ['state' => 'Jawa Barat', 'city' => 'Bandung', 'country' => 'Indonesia', 'lat' => -6.9175, 'lng' => 107.6191],
            ['state' => 'Banten', 'city' => 'Serang', 'country' => 'Indonesia', 'lat' => -6.1201, 'lng' => 106.1503],
            ['state' => 'Jawa Tengah', 'city' => 'Semarang', 'country' => 'Indonesia', 'lat' => -6.9667, 'lng' => 110.4167],
            ['state' => 'DI Yogyakarta', 'city' => 'Yogyakarta', 'country' => 'Indonesia', 'lat' => -7.7956, 'lng' => 110.3695],
            ['state' => 'Jawa Timur', 'city' => 'Surabaya', 'country' => 'Indonesia', 'lat' => -7.2575, 'lng' => 112.7521],

            ['state' => 'Bali', 'city' => 'Denpasar', 'country' => 'Indonesia', 'lat' => -8.6705, 'lng' => 115.2126],
            ['state' => 'Nusa Tenggara Barat', 'city' => 'Mataram', 'country' => 'Indonesia', 'lat' => -8.5833, 'lng' => 116.1167],
            ['state' => 'Nusa Tenggara Timur', 'city' => 'Kupang', 'country' => 'Indonesia', 'lat' => -10.1772, 'lng' => 123.6070],

            ['state' => 'Kalimantan Barat', 'city' => 'Pontianak', 'country' => 'Indonesia', 'lat' => -0.0263, 'lng' => 109.3425],
            ['state' => 'Kalimantan Tengah', 'city' => 'Palangkaraya', 'country' => 'Indonesia', 'lat' => -2.2096, 'lng' => 113.9165],
            ['state' => 'Kalimantan Selatan', 'city' => 'Banjarmasin', 'country' => 'Indonesia', 'lat' => -3.3186, 'lng' => 114.5944],
            ['state' => 'Kalimantan Timur', 'city' => 'Samarinda', 'country' => 'Indonesia', 'lat' => -0.5022, 'lng' => 117.1536],
            ['state' => 'Kalimantan Utara', 'city' => 'Tanjung Selor', 'country' => 'Indonesia', 'lat' => 2.8375, 'lng' => 117.3653],

            ['state' => 'Sulawesi Utara', 'city' => 'Manado', 'country' => 'Indonesia', 'lat' => 1.4748, 'lng' => 124.8421],
            ['state' => 'Sulawesi Tengah', 'city' => 'Palu', 'country' => 'Indonesia', 'lat' => -0.8986, 'lng' => 119.8707],
            ['state' => 'Sulawesi Selatan', 'city' => 'Makassar', 'country' => 'Indonesia', 'lat' => -5.1477, 'lng' => 119.4327],
            ['state' => 'Sulawesi Tenggara', 'city' => 'Kendari', 'country' => 'Indonesia', 'lat' => -3.9985, 'lng' => 122.5129],
            ['state' => 'Gorontalo', 'city' => 'Gorontalo', 'country' => 'Indonesia', 'lat' => 0.5435, 'lng' => 123.0568],
            ['state' => 'Sulawesi Barat', 'city' => 'Mamuju', 'country' => 'Indonesia', 'lat' => -2.6770, 'lng' => 118.8867],

            ['state' => 'Maluku', 'city' => 'Ambon', 'country' => 'Indonesia', 'lat' => -3.6954, 'lng' => 128.1814],
            ['state' => 'Maluku Utara', 'city' => 'Ternate', 'country' => 'Indonesia', 'lat' => 0.7893, 'lng' => 127.3771],

            ['state' => 'Papua', 'city' => 'Jayapura', 'country' => 'Indonesia', 'lat' => -2.5337, 'lng' => 140.7181],
            ['state' => 'Papua Barat', 'city' => 'Manokwari', 'country' => 'Indonesia', 'lat' => -0.8615, 'lng' => 134.0620],
            ['state' => 'Papua Selatan', 'city' => 'Merauke', 'country' => 'Indonesia', 'lat' => -8.4932, 'lng' => 140.4018],
            ['state' => 'Papua Pegunungan', 'city' => 'Wamena', 'country' => 'Indonesia', 'lat' => -4.1000, 'lng' => 138.9167],
            ['state' => 'Papua Tengah', 'city' => 'Nabire', 'country' => 'Indonesia', 'lat' => -3.3667, 'lng' => 135.4833],
        ];


        Location::insert($locations);
    }
}
