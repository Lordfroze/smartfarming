<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Greenhouse A',
                'type' => 'greenhouse',
                'description' => 'Area utama sayuran',
            ],
            [
                'name' => 'Lahan Belakang',
                'type' => 'open_field',
                'description' => 'Dekat sumber air',
            ],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
