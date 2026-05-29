<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    //
    protected $fillable = [
        'plant_batch_id',
        'harvest_date',
        'quantity',
        'unit',
        'quality_grade',
        'notes',
        'created_by',
    ];

    // relasi
    public function plantBatch()
    {
        return $this->belongsTo(PlantBatch::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
