<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Region;
use App\Models\Service;
use App\Models\VehicleType;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class CarListing extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public array $selectedFilters = [];
    public array $selected_car_specs = [];
    public array $selected_transmissions = [];
    public array $selected_car_makes = [];
    public array $selected_car_types = [];
    public array $selected_car_models = [];
    public array $selected_mileage = [];
    public array $selected_electric_cars = [];
    public array $selected_car_seats = [];

    public ?string $order_by = null;

    public $search;
    public $priceRange = 10;
    public $min_price = 0;
    public $max_price = 10;
    public int $booking_day = 0;
    public int $total_cars = 0;
    public int $total_booking = 0;
    public ?string $pick_up_date = null;
    public ?string $drop_off_date = null;
    public Region $location;

    #[Computed]
    public bool $loading = false;

    public array $filters = [
        'car_specs' => [
            'Air conditioning',
            '4+ door',
        ],
        'electric_cars' => [
            'fully_electric',
            'hybrid',
            'plug_in_hybrid',
        ],
        'mileage' => [
            'limited',
            'unlimited',
        ],
        'transmissions' => [
            'automatic',
            'manual',
        ],
    ];

    public function mount()
    {
        $this->pick_up_date = request()->query('pick_up_date');
        $this->drop_off_date = request()->query('drop_off_date');
        
        $location_id = request()->query('pick_up_location_id');
        $this->booking_day = request()->query('booking_day');
        $this->location = Region::withoutAirport()->withCount(['cars' => function ($query) {
            $query->where('is_approved', true);
        }, 'bookings'])->findOrFail($location_id);
        $this->total_cars = $this->location->cars_count;
        $this->total_booking = $this->location->bookings_count;
    }

    public function services()
    {
        return Service::where('is_active', true)->get();
    }

    public function vehicleTypes()
    {
        $types = VehicleType::where('is_active', true)->get();

        if ($types->isEmpty()) {
            $defaultTypes = [
                ['name' => 'Sedan', 'icon' => '/assets/img/icons/car-sedan.png'],
                ['name' => 'SUV', 'icon' => '/assets/img/icons/car-suv.png'],
                ['name' => 'Luxury', 'icon' => '/assets/img/icons/car-luxury.png'],
                ['name' => 'Economy', 'icon' => '/assets/img/icons/car-economy.png']
            ];

            return collect($defaultTypes)->map(function ($type) {
                $vehicleType = new VehicleType();
                $vehicleType->name = $type['name'];
                $vehicleType->icon = $type['icon'];
                return $vehicleType;
            });
        } else {
            return $types;
        }
    }

    public function render()
    {
        $booking_type = 'day';
        $priceColumn = 'daily_rate';
        $day = $this->booking_day;
        if(is_int($this->booking_day / 30)){
            $booking_type = 'month';
            $priceColumn = 'monthly_rate';
            $day = $this->booking_day / 30;
        } else if(is_int($this->booking_day / 7)){
            $booking_type = 'week';
            $priceColumn = 'weekly_rate';
            $day = $this->booking_day / 7;
        }

        $services = $this->services();
        $vehicle_types = $this->vehicleTypes();

        $this->loading = true;

        $filteredCars = Car::query();
        
        $filteredCars->where('region_id', $this->location->id)
            ->where('is_available', true)
            ->where('is_approved', '1');

        $this->filters['car_types'] = array_unique($filteredCars->pluck('type')->toArray());

        $this->filters['car_makes'] = array_unique($filteredCars->pluck('make')->toArray());
        $this->filters['car_models'] = array_unique($filteredCars->pluck('model')->toArray());
        $this->filters['car_seats'] = array_unique($filteredCars->pluck('seats')->toArray());

        $this->min_price = (clone $filteredCars)->selectRaw("MIN($priceColumn * $day) AS price")->first()?->price ?? 0;
        $this->max_price = (clone $filteredCars)->selectRaw("MAX($priceColumn * $day) AS price")->first()?->price ?? 0;

        $filteredCars->whereRaw("($priceColumn * $day) BETWEEN ? AND ?", [$this->priceRange, $this->max_price]);

        $filteredCars->when(count($this->selected_transmissions) > 0, function ($query) {
            $query->whereIn('gear', $this->selected_transmissions);
        });

        $filteredCars->when(count($this->selected_car_makes) > 0, function ($query) {
            $query->whereIn('make', $this->selected_car_makes);
        });

        $filteredCars->when(count($this->selected_car_models) > 0, function ($query) {
            $query->whereIn('model', $this->selected_car_models);
        });

        $filteredCars->when(count($this->selected_car_types) > 0, function ($query) {
            $query->whereIn('type', $this->selected_car_types);
        });

        $filteredCars->when(count($this->selected_car_seats) > 0, function ($query) {
            $query->whereIn('seats', $this->selected_car_seats);
        });

        $filteredCars->when(count($this->selected_mileage) > 0, function ($query) {
            if (in_array('unlimited', $this->selected_mileage)) {
                $query->where('mileage_policy', 'unlimited');
            }

            if (in_array('limited', $this->selected_mileage)) {
                $query->where(function ($query) {
                    $query->where('mileage_policy', 'like', 'limited%');
                });
            }
        });

        $filteredCars->when(count($this->selected_car_specs) > 0, function ($query) {
            if (in_array('4+ door', $this->selected_car_specs)) {
                $query->where('door', '>', 3);
            }
        });

        $filteredCars->when(count($this->selected_electric_cars) > 0, function ($query) {
            $query->whereIn('fuel_type', $this->selected_electric_cars);
        });
        
        $filteredCars->whereRaw('cars.id NOT IN (SELECT car_id FROM car_blackouts WHERE start_date_time < ? AND end_date_time > ? AND status = 1)', [
            $this->drop_off_date,
            $this->pick_up_date,
        ]);

        switch($this->order_by ?? ''){
            case 'price_asc':
                $filteredCars->orderBy('daily_rate', 'asc');
                break;
            case 'price_desc':
                $filteredCars->orderBy('daily_rate', 'desc');
                break;
            default:
                $filteredCars->orderBy('created_at', 'desc');
                break;
        }
        
        $filteredCars = $filteredCars->paginate(4);

        $this->loading = false;

        return view('livewire.car-listing',  compact('filteredCars', 'services', 'vehicle_types', 'booking_type'));
    }

    public function filterHeading($title): string
    {
        return 'title';
    }
}
