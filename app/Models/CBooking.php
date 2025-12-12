<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CBooking extends Model {
    protected $table = 'chauffeur_bookings';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id', 'car_id', 'user_id', 'pickup_location', 'dropoff_location', 'stops',
        'pickup_date', 'pickup_time', 'trip_type', 'trip_type_extra', 'passengers',
        'full_name', 'phone_no', 'email_addr', 'company_name',
        'special_reqs', 'addons', 'car_snapshot', 'status', 'pg_status', 'pg_tx_id', 'total_amount',
        'addons_total', 'trip_amount', 'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'date',
        'stops' => 'array',
        'trip_type_extra' => 'array',
        'special_reqs' => 'array',
        'addons' => 'array',
        'car_snapshot' => 'array',
    ];

    public function car(): BelongsTo {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
