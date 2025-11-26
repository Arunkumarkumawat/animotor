<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

    use HasUuids;

    protected $fillable = [
        'name',
        'address',
        'postal_code',
        'city',
        'state',
        'country',
        'tin',
        'contact_name',
        'contact_phone',
        'contact_email',
        'logo',
        'trading_name',
        'registration_no',
        'incorporation_date',
        'company_type',
        'business_email',
        'timezone',
        'operating_license',
        'finance_contact_name',
        'finance_contact_email',
        'finance_contact_phone',
        'support_contact_name',
        'support_contact_email',
        'support_contact_phone',
    ];

    public function getLogoAttribute($value): string
    {
        if(!$value) {
            return asset('default/404.png');
        }
        return $value;
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class,'company_id');
    }
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class,'company_id');
    }

    public function company_address(): string
    {
        $address = $this->address.", ".$this->state.", ".$this->country;
        return $address;
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'company_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'company_id');
    }

     /**
     * Get the branches for the company.
     */
    public function branches(): HasMany
    {
        return $this->hasMany(CompanyBranch::class);
    }

    /**
     * Get the finance info for the company.
     */
    public function financeInfo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CompanyFinanceInfo::class);
    }
}