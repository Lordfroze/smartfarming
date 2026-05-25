<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CareSchedule extends Model
{
    protected $fillable = [
        'plant_batch_id',
        'care_template_id',
        'scheduled_date',
        'status',
    ];

    protected $casts = [
        'scheduled_date' => 'date',
    ];

    public function plantBatch(): BelongsTo
    {
        return $this->belongsTo(PlantBatch::class);
    }

    public function careTemplate(): BelongsTo
    {
        return $this->belongsTo(CareTemplate::class);
    }
}
