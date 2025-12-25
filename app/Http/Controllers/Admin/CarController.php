<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Region;
use App\Models\VehicleMake;
use App\Models\VehicleType;
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

    public function create(){
        $car_makes = VehicleMake::all();
        $car_types = VehicleType::all();
        $regions = Region::select('id','name')->get();
        $car_models = [];
        return view('admin.cars.create', compact('regions','car_types','car_models','car_makes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'register_for' => 'required',
            'make' => 'required',
            'model' => 'required',
            'type' => 'required',
            'region_id' => 'nullable',
            'door' => 'required',
            'year' => 'nullable',
            'color' => 'required',
            'registration_number' => 'nullable',
            'license_no' => 'nullable',
            'vehicle_no' => 'required',
            'youtube_link' => 'nullable',
            'gear' => 'nullable',
            'title' => 'required',
            'deposit' => 'nullable',
            'bags' => 'required',
            'bags_large' => 'required',
            'air_condition' => 'nullable',
            'seats' => 'nullable',            
            'pickup' => 'nullable|array',
            'pickup.*.location' => 'required|string',
            'pickup.*.latitude' => 'required|numeric',
            'pickup.*.longitude' => 'required|numeric',
            'dropup' => 'nullable|array',
            'dropup.*.location' => 'required|string',
            'dropup.*.latitude' => 'required|numeric',
            'dropup.*.longitude' => 'required|numeric',
            'vehicle_features' => 'nullable|array',
        ]);

        $validatedData['company_id'] = getCompany()->id;

        if($validatedData['register_for'] == 'Private Hire'){
            $validatedData['private_hire'] = true;
        } else if($validatedData['register_for'] == 'Chauffeur'){
            $validatedData['chauffeur'] = true;
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

    public function edit(Request $request, $id){
        $car = Car::findOrFail($id);
        $step = $request->input('step', 1);
        return view('admin.cars.edit', compact('car','step'));
    }
}
