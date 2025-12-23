<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Region;
use App\Models\Company;
use App\Models\CarExtra;
use App\Models\DriverPcn;
use App\Models\VehicleMake;
use App\Models\VehicleType;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use App\Traits\EditCarStepsTrait;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    use EditCarStepsTrait;
    
    public function index()
    {
        return view('admin.cars.list');
    }

    private function getOrCreateAnimotorCompany()
    {
        $ani_motor = Company::where('contact_name', 'animotor')->first();
        
        if (!$ani_motor) {
            $admin = auth()->user();
            $ani_motor = Company::create([
                'name' => 'Animotor',
                'contact_name' => 'animotor',
                'contact_email' => $admin->email,
                'contact_phone' => '0' . rand(100000000, 999999999), // Random 10-digit number starting with 0
                'address' => null,
                'postal_code' => null,
                'city' => null,
                'state' => null,
                'country' => null,
                'tin' => null,
                'logo' => null,
            ]);
        }
        
        return $ani_motor;
    }

    public function create(){
        $car_makes = VehicleMake::all();
        $car_types = VehicleType::all();
        $regions = Region::select('id','name')->get();
        $car_models = [];
        return view('admin.cars.create', compact('regions','car_types','car_models','car_makes'));
    }

    public function store(Request $request)
    {
       $validatedData = $this->validateData($request);

        if(isOwner()){
            $validatedData['company_id'] = companyId();
        }

        if(auth()->user()->hasRole('superadmin|admin')){
            $ani_motor = $this->getOrCreateAnimotorCompany();
            $validatedData['company_id'] = $ani_motor->id;
        }

        $car = Car::create($validatedData);
        $message = $car->title." created successfully.";

        auth()->user()->activityLog('New Car created.',['car_name' => $car->title]);

        if(settings('enable_rental') == 'yes'){
            return redirect()->route('admin.cars.edit', $car->id)->with('success', $message );
        }
        return redirect()->route('admin.cars.index')->with('success', $message);
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        $car->delete();

        auth()->user()->activityLog('Car deleted.', ['car_name' => $car->title]);

        return redirect()->back()->with('success', 'Car deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'make' => 'required',
            'model' => 'required',
            'type' => 'required',
            'driver_id' => 'nullable',
            'region_id' => 'nullable',
            'regional_packages' => 'nullable',
            'door' => 'required',
            'year' => 'nullable',
            'color' => 'required',
            'registration_number' => 'nullable',
            'license_no' => 'nullable',
            
            'vehicle_no' => 'required',
            'image' => 'nullable',
            'photos' => 'nullable',
            'youtube_link' => 'nullable',
            'gear' => 'nullable',
            'title' => 'required',

            'deposit' => 'nullable',
            'bags' => 'required',
            'bags_large' => 'required',
            'cancellation_fee' => 'nullable',
            'price_per_mileage' => 'nullable',
            'mileage' => 'nullable',

            'air_condition' => 'nullable',
            'seats' => 'nullable',
            'insurance_fee' => 'nullable',
            
            'pickup' => 'nullable|array',
            'pickup.*.location' => 'required|string',
            'pickup.*.latitude' => 'required|numeric',
            'pickup.*.longitude' => 'required|numeric',
            
            'dropup' => 'nullable|array',
            'dropup.*.location' => 'required|string',
            'dropup.*.latitude' => 'required|numeric',
            'dropup.*.longitude' => 'required|numeric',
            'vehicle_features' => 'nullable|array',
        ];

        return $request->validate($rules);
    }

    public function edit(Request $request, $id){
        $car = Car::findOrFail($id);
        $step = $request->input('step', 1);
        return view('admin.cars.edit', compact('car','step'));
    }
}
