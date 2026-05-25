<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    //
    protected $fillable = [
        'plant_batch_id',
        'care_schedule_id',
        'activity_type',
        'activity_date',
        'title',
        'notes',
        'quantity',
        'unit',
        'created_by',
    ];

    public function plantBatch()
    {
        return $this->belongsTo(PlantBatch::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
