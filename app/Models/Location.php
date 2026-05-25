<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
    ];

    public function plantBatches(): HasMany
    {
        return $this->hasMany(PlantBatch::class);
    }
}
