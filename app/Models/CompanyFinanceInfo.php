<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyFinanceInfo extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'company_id',
        'preferred_currency',
        'tax_profile',
        'tax_id',
        'reverse_charge',
        'payout_type',
        'iban',
        'account_title',
        'sort_code',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'reverse_charge' => 'string',
    ];

    /**
     * Get the company that owns the finance info.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}