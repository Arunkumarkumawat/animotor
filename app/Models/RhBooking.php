<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhBooking extends Model
{
    protected $table = 'rh_bookings';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'user_id',
        'car_id',
        'term',
        'insurance',
        'term_count',
        'term_period',
        'start_date',
        'expected_end_date',
        'extras',
        'curr_pricing_data',
        'deposit_paid',
        'rate_paid',
        'extras_paid',
        'total_paid',
        'pg_tx_id',
        'pg_status',
        'paid_at',
        'booking_status',
    ];

    protected $casts = [
        'extras' => 'array',
        'curr_pricing_data' => 'array',
        'start_date' => 'date',
        'expected_end_date' => 'date',
        'term_count' => 'integer',
        'deposit_paid' => 'double',
        'rate_paid' => 'double',
        'extras_paid' => 'double',
        'total_paid' => 'double',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'paid_at' => 'datetime',
    ];

    protected $attributes = [
        'pg_status' => 'Pending',
        'booking_status' => 'Pending',
        'deposit_paid' => 0,
        'rate_paid' => 0,
        'extras_paid' => 0,
        'total_paid' => 0,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}