<?php

namespace Database\Seeders;

use App\Models\PlantType;
use Illuminate\Database\Seeder;

class PlantTypeSeeder extends Seeder
{
    public function run(): void
    {
        $plants = [
            [
                'name' => 'Kangkung',
                'category' => 'Sayuran Daun',
                'description' => 'Cepat panen dan butuh banyak air',
                'estimated_harvest_days' => 30,
            ],
            [
                'name' => 'Kemangi',
                'category' => 'Herbal',
                'description' => 'Tanaman aroma khas',
                'estimated_harvest_days' => 45,
            ],
            [
                'name' => 'Kenikir',
                'category' => 'Sayuran',
                'description' => 'Daun lalapan',
                'estimated_harvest_days' => 40,
            ],
        ];

        foreach ($plants as $plant) {
            PlantType::create($plant);
        }
    }
}
