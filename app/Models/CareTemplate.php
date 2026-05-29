<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareTemplate extends Model
{
    //
    protected $fillable = [
        'plant_type_id',
        'day_offset',
        'activity_type',
        'title',
        'description',
    ];

    public function plantType()
    {
        return $this->belongsTo(PlantType::class);
    }
}
