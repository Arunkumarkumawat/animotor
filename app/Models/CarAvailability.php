<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarAvailability extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'day_of_week',
        'pickup_hours_start',
        'pickup_hours_end',
        'return_hours_start',
        'return_hours_end',
        'status',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
