<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlantType extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'estimated_harvest_days',
        'status'
    ];

    public function careTemplates(): HasMany
    {
        return $this->hasMany(CareTemplate::class);
    }

    public function plantBatches(): HasMany
    {
        return $this->hasMany(PlantBatch::class);
    }
}
