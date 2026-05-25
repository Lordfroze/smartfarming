<?php

namespace Database\Seeders;

use App\Models\CareTemplate;
use App\Models\PlantType;
use Illuminate\Database\Seeder;

class CareTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $kangkung = PlantType::where('name', 'Kangkung')->first();

        if ($kangkung) {

            CareTemplate::create([
                'plant_type_id' => $kangkung->id,
                'day_offset' => 1,
                'activity_type' => 'watering',
                'title' => 'Penyiraman Awal',
                'description' => 'Siram pagi dan sore',
            ]);

            CareTemplate::create([
                'plant_type_id' => $kangkung->id,
                'day_offset' => 7,
                'activity_type' => 'fertilizing',
                'title' => 'Pemupukan Pertama',
                'description' => 'Gunakan pupuk organik cair',
            ]);

            CareTemplate::create([
                'plant_type_id' => $kangkung->id,
                'day_offset' => 25,
                'activity_type' => 'harvest_preparation',
                'title' => 'Persiapan Panen',
                'description' => 'Cek kualitas daun',
            ]);
        }
    }
}
