<?php

namespace App\Models;

use App\Models\Addons\pcn;
use App\Traits\FillableTraits;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;
    use HasUuids;
    use FillableTraits;

    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = $this->car;
    }

    protected $with = ['company'];

    protected $casts = [
        'extras' => 'array',
        'driver' => 'array',
        'dynamic_pricings' => 'array',
        'is_approved' => 'integer',
        'vehicle_photos' => 'array',
        'long_term_term_options' => 'array',
        'long_term_prices' => 'array',
        'pickup' => 'array',
        'dropup' => 'array',
        'free_cancellation' => 'boolean',
        'collision_damage_waiver' => 'boolean',
        'theft_protection' => 'boolean',
        'unlimited_mileage' => 'boolean',
        'vehicle_features' => 'array',
        'daily_rate_tax_incl' => 'boolean',
        'weekly_rate_tax_incl' => 'boolean',
        'monthly_rate_tax_incl' => 'boolean',
        'hourly_rate_tax_incl' => 'boolean',
        'p2p_rate_tax_incl' => 'boolean',
        'airport_transfer_rate_tax_incl' => 'boolean',
        'long_transfer_rate_tax_incl' => 'boolean',
        'event_hire_rate_tax_incl' => 'boolean',
        'chauffer_features1' => 'array',
        'chauffer_features2' => 'array',
        'chauffer_addons' => 'array',
        'chauffer_terms' => 'array',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function carExtra(): HasOne
    {
        return $this->hasOne(CarExtra::class);
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany(CarAvailability::class, 'car_id', 'id');
    }

    public function blackouts(): HasMany
    {
        return $this->hasMany(CarBlackout::class, 'car_id', 'id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
    public function pcns(): HasMany
    {
        return $this->hasMany(pcn::class);
    }

    public function getExtrasAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }


    public function setExtrasAttribute($value)
    {
        $this->attributes['extras'] = json_encode($value);
    }


    public function getInsuranceCoverageAttribute($value)
    {
        if(!$value){
            return [];
        }
        return json_decode($value, true);
    }


    public function setInsuranceCoverageAttribute($value)
    {
        $this->attributes['insurance_coverage'] = json_encode($value);
    }



    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id')
            ->withDefault([
                'name' => settings('site_name'),
                'address' => settings('address'),
                'logo' => settings('front_logo'),
                'contact_phone' => settings('contact_phone'),
                'contact_email' => settings('contact_email'),
            ]);
    }

    protected $appends = ['includes','why','details','photos_array'];

    public function getIncludesAttribute(): array
    {
        return [
            $this->cancellation_policy == 0 ? 'No Cancellation Allowed' : 'Free cancellation up to '. $this->cancellation_policy.' hours before pick-up',
            'Collision Damage Waiver',
            'Theft Protection',
            $this->mileage < 1 ? 'Unlimited mileage' : $this->mileage.' mileage per rental'
        ];
    }
    public function getWhyAttribute(): array
    {
        return [
            "Customer rating: 8.0 / 10",
            'Most popular fuel policy',
            'Short queues',
            'Easy to find counter',
            'Helpful counter staff',
            $this->cancellation_policy == 0 ? 'No Cancellation Allowed' : 'Free Cancellation up to '.$this->cancellation_policy.' hours before pick-up'
        ];
    }

    public function getPhotosArrayAttribute(): array
    {
        return $this->vehicle_photos ?? [];
    }

    public function getDetailsAttribute(): array
    {
        return [
            ['icon' => asset('icon/car/person.png'), 'item' => $this->door . ' Doors'],
            ['icon' => asset('icon/car/gear.png'), 'item' => $this->gear . ' Gear'],
            ['icon' => asset('icon/car/color.png'), 'item' => $this->color . ' Color'],
            ['icon' => asset('icon/car/year.png'), 'item' => "Year : ". $this->year],
        ];
    }

    public function getAttributesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setAttributesAttribute($value)
    {
        $this->attributes['attributes'] = json_encode($value);
    }

    public function getImageAttribute($value): string
    {
        $photos = $this->vehicle_photos;

        if(!$photos) {
            return asset('default/404.png');
        }

        return $photos[0];
    }

    public function attributeList(): array
    {
        return [
            ['name' => 'Mileage', 'attribute' => 'mileage'],
            ['name' => 'Color', 'attribute' => 'color'],
            ['name' => 'Engine', 'attribute' => 'engine'],
            // Add more attributes as needed
        ];
    }

    public function requirements(){
        return explode(',', $this->requirements);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function getMileagePolicyFormattedAttribute()
    {
        return 'Miles ' . ucwords(str_replace('_', ' ', str_replace('limited_', ' ', $this->mileage_policy)));
    }

    public function getMinRentalPeriodAttribute()
    {
        if($this->private_hire){
            if($this->short_term){
                return $this->short_term_minimum_term . ' weeks';
            } else if($this->long_term){
                $termOptions = $this->long_term_term_options ?? [];
                foreach($termOptions as $option){
                    return str_replace('m', ' months', $option['value']);
                }
            } else if($this->rent_to_buy){
                return $this->rent_to_buy_term . ' weeks';
            }
        }

        return '';
    }

    public function getMinRentalCostAttribute()
    {
        if($this->private_hire){
            if($this->short_term){
                return amt($this->short_term_weekly_price_wo_ins) . ' / week';
            } else if($this->long_term){
                $termOptions = $this->long_term_term_options ?? [];

                $minimumTerm = null;
                foreach($termOptions as $option){
                    $minimumTerm = str_replace('m', '', $option);
                }
                
                return amt($this->long_term_prices[$minimumTerm . 'm']['price_wo_ins']) . ' / ' . $minimumTerm . ' months';
            } else if($this->rent_to_buy){
                return $this->rent_to_buy_price_per_cycle . ' / ' . $this->rent_to_buy_billing_cycle;
            }
        }

        return '';
    }

    public function getMinDepositAttribute(){
        if($this->private_hire){
            if($this->short_term){
                return amt($this->short_term_deposit);
            } else if($this->long_term){
                return amt($this->long_term_default_deposit);
            } else if($this->rent_to_buy){
                return amt($this->rent_to_buy_deposit_amount);
            }
        }

        return '';
    }

    public function getRentingTermAttribute(){
        if($this->private_hire){
            if($this->short_term && $this->long_term){
                return 'Weekly/Monthly';
            } else if($this->short_term){
                return 'Weekly';
            } else if($this->long_term){
                return 'Monthly';
            }
        }

        return '';
    }
}
