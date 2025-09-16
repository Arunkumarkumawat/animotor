<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarBlackout extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'start_date_time',
        'end_date_time',
        'reason',
        'hard_block',
        'notes',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
