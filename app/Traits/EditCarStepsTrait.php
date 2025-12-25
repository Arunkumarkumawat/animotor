<?php

namespace App\Traits;

use App\Models\Car;
use App\Models\CarExtra;
use Illuminate\Http\Request;
use App\Models\InsuranceCoverage;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Validator;

trait EditCarStepsTrait
{
    public function updateStepData(Request $request, $id, $step)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        switch ($step) {
            case 0:
                return $this->saveStep0($request, $car);
            case 1:
                return $this->saveStep1($request, $car);
            case 2:
                return $this->saveStep2($request, $car);
            case 8:
                return $this->saveStep8($request, $car);
        }
    }

    public function saveStep0($request, $car)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'make' => 'required',
            'type' => 'required',
            'region_id' => 'nullable',
            'door' => 'required',
            'year' => 'nullable',
            'color' => 'required',
            'registration_number' => 'nullable',
            'license_no' => 'nullable',
            'model' => 'required',
            'vehicle_no' => 'required',
            'youtube_link' => 'nullable',
            'gear' => 'nullable',
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

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car->update([
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'gear' => $request->input('gear'),
            'color' => $request->input('color'),
            'door' => $request->input('door'),
            'seats' => $request->input('seats'),
            'bags' => $request->input('bags'),
            'bags_large' => $request->input('bags_large'),
            'vehicle_features' => $request->input('vehicle_features'),
            'air_condition' => $request->input('air_condition'),
            'vehicle_no' => $request->input('vehicle_no'),
            'license_no' => $request->input('license_no'),
            'registration_number' => $request->input('registration_number'),
            'year' => $request->input('year'),
            'deposit' => $request->input('deposit'),
            'region_id' => $request->input('region_id'),
            'pickup' => $request->input('pickup'),
            'dropup' => $request->input('dropup'),
            'youtube_link' => $request->input('youtube_link'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully saved',
        ]);
    }

    public function saveStep1($request, $car)
    {
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'string'],

            'top_pick' => ['nullable', 'boolean'],
            'ideal_for_family' => ['nullable', 'boolean'],
            'free_cancellation' => ['nullable', 'boolean'],
            'collision_damage_waiver' => ['nullable', 'boolean'],
            'theft_protection' => ['nullable', 'boolean'],
            'unlimited_mileage' => ['nullable', 'boolean'],

            'fuel_type' => ['required', 'string'],
            'engine_size' => ['required', 'string'],
            'mileage_policy' => ['nullable', 'string'],
            'mileage_limit' => ['nullable', 'numeric'],
            'excess_mileage_rate' => ['nullable', 'numeric'],
            'cancellation_policy' => ['nullable', 'string'],

            'is_taxed' => ['nullable'],
            'tax_amount' => ['nullable'],
            'tax_type' => ['nullable'],
            'tax_expiry_date' => 'nullable|date_format:Y-m-d|after_or_equal:today',

            'finance.finance_type' => ['nullable', 'string'],
            'finance.purchase_price' => ['nullable', 'string'],
            'finance.agreement_number' => ['nullable', 'string'],
            'finance.funder_name' => ['nullable', 'string'],
            'finance.agreement_start_date' => ['nullable', 'string'],
            'finance.agreement_end_date' => ['nullable', 'string'],
            'finance.loan_amount' => ['nullable', 'string'],
            'finance.repayment_frequency' => ['nullable', 'string'],
            'finance.amount' => ['nullable', 'string'],

            'photos_input' => ['nullable', 'array'],
            'photos_input.*' => ['required', 'image', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $vehicle_photos = $car->vehicle_photos;
        if ($request->hasFile('photos_input')) {
            $photos = [];
            $uploadService = new FileUploadService();

            foreach ($request->file('photos_input') as $photo) {
                $photos[] = $uploadService->userFileUpload($photo);
            }

            $vehicle_photos = $photos;
        }

        $car->update([
            'description' => $request->input('description'),
            'top_pick' => $request->input('top_pick', 0),
            'ideal_for_family' => $request->input('ideal_for_family', 0),
            'free_cancellation' => $request->input('free_cancellation', 0),
            'collision_damage_waiver' => $request->input('collision_damage_waiver', 0),
            'theft_protection' => $request->input('theft_protection', 0),
            'unlimited_mileage' => $request->input('unlimited_mileage', 0),
            'fuel_type' => $request->input('fuel_type'),
            'engine_size' => $request->input('engine_size'),
            'mileage_policy' => $request->input('mileage_policy'),
            'mileage_limit' => $request->input('mileage_limit'),
            'excess_mileage_rate' => $request->input('excess_mileage_rate'),
            'cancellation_policy' => $request->input('cancellation_policy'),
            'vehicle_photos' => $vehicle_photos,
        ]);

        $newData = [
            'is_taxed' => $request->input('is_taxed', 0),
            'tax_expiry_date' => $request->input('tax_expiry_date'),
            'tax_type' => $request->input('tax_type'),
            'tax_amount' => $request->input('tax_amount'),
            'finance' => [
                'finance_type' => $request->input('finance.finance_type'),
                'purchase_price' => $request->input('finance.purchase_price'),
                'agreement_number' => $request->input('finance.agreement_number'),
                'funder_name' => $request->input('finance.funder_name'),
                'agreement_start_date' => $request->input('finance.agreement_start_date'),
                'agreement_end_date' => $request->input('finance.agreement_end_date'),
                'loan_amount' => $request->input('finance.loan_amount'),
                'repayment_frequency' => $request->input('finance.repayment_frequency'),
                'amount' => $request->input('finance.amount'),
            ],
        ];

        $carExtra = $car->carExtra;
        if ($carExtra) {
            $carExtra->update($newData);
        } else {
            $newData['car_id'] = $car->id;
            CarExtra::create($newData);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully saved',
        ]);
    }

    public function saveStep2($request, $car)
    {
        $validator = Validator::make($request->all(), [
            'daily_rate' => ['required', 'numeric', 'min:0'],
            'weekly_rate' => ['required', 'numeric', 'min:0'],
            'monthly_rate' => ['required', 'numeric', 'min:0'],
            'daily_rate_tax_incl' => ['nullable', 'boolean'],
            'weekly_rate_tax_incl' => ['nullable', 'boolean'],
            'monthly_rate_tax_incl' => ['nullable', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car->update([
            'daily_rate' => $request->daily_rate,
            'weekly_rate' => $request->weekly_rate,
            'monthly_rate' => $request->monthly_rate,
            'daily_rate_tax_incl' => $request->input('daily_rate_tax_incl', 0),
            'weekly_rate_tax_incl' => $request->input('weekly_rate_tax_incl', 0),
            'monthly_rate_tax_incl' => $request->input('monthly_rate_tax_incl', 0),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully saved',
        ]);
    }

    public function saveStep8($request, $car)
    {
        $validator = Validator::make($request->all(), [
            'requirements' => ['required', 'string'],
            'security_deposit' => ['required', 'string'],
            'damage_excess' => ['required', 'string'],
            'mileage_text' => ['required', 'string'],
            'important_text' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car->update([
            'requirements' => $request->input('requirements'),
            'security_deposit' => $request->input('security_deposit'),
            'damage_excess' => $request->input('damage_excess'),
            'mileage_text' => $request->input('mileage_text'),
            'important_text' => $request->input('important_text'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully saved',
        ]);
    }

    public function addDynamicPricing(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rule_name' => 'required|string|max:255',
            'adjustment_type' => 'required|string|max:255',
            'adjustment_value' => 'required_if:adjustment_type,fixed_price,fixed_surcharge|nullable|numeric',
            'adjustment_percent' => 'required_if:adjustment_type,percentage_increase|nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $dynamic_pricings = $car->dynamic_pricings;
        $dynamic_pricings[] = [
            'rule_name' => $request->rule_name,
            'adjustment_type' => $request->adjustment_type,
            'adjustment_value' => $request->adjustment_type == 'percentage_increase' ? $request->adjustment_percent : $request->adjustment_value,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];
        $car->dynamic_pricings = $dynamic_pricings;
        $car->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Dynamic pricing added successfully.',
            'data' => $car->dynamic_pricings,
        ]);
    }

    public function deleteDynamicPricing(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $dynamic_pricings = $car->dynamic_pricings;
        unset($dynamic_pricings[$request->index]);
        $car->dynamic_pricings = array_values($dynamic_pricings);
        $car->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Dynamic pricing deleted successfully.',
            'data' => $car->dynamic_pricings,
        ]);
    }

    public function addExtra(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'interval' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $extras = $car->extras;
        $extras[] = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'interval' => $request->interval,
        ];
        $car->extras = $extras;
        $car->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Extra added successfully.',
            'data' => $car->extras,
        ]);
    }

    public function deleteExtra(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $extras = $car->extras;
        unset($extras[$request->index]);
        $car->extras = array_values($extras);
        $car->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Extra deleted successfully.',
            'data' => $car->extras,
        ]);
    }

    public function addInsuranceCoverage(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'level' => 'required|string|max:255',
            'policy_id' => 'required|string|max:255',
            'cover' => 'nullable|string|max:255',
            'cover_descr' => 'nullable|string|max:255',
            'daily_price' => 'nullable|numeric|min:0',
            'excess' => 'nullable|numeric|min:0',
            'interval' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $insurance_coverages = $car->insurance_coverage;
        $insurance_coverages[] = [
            'level' => $request->level,
            'policy_id' => $request->policy_id,
            'cover' => $request->cover ?? '',
            'cover_descr' => $request->cover_descr ?? '',
            'daily_price' => $request->daily_price ?? '',
            'excess' => $request->excess ?? '',
            'interval' => $request->interval ?? '',
        ];
        $car->insurance_coverage = $insurance_coverages;
        $car->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Insurance coverage added successfully.',
            'data' => $car->insurance_coverage,
        ]);
    }

    public function deleteInsuranceCoverage(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $insurance_coverages = $car->insurance_coverage;
        unset($insurance_coverages[$request->index]);
        $car->insurance_coverage = array_values($insurance_coverages);
        $car->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Insurance coverage deleted successfully.',
            'data' => $car->insurance_coverage,
        ]);
    }

    public function updatePolicyDropdown(Request $request)
    {
        $policies = InsuranceCoverage::where('policy_type', $request->level)
            //->where('company_id', $user ? $user->id : $company_id)
            ->where('status', 'Active')
            ->where('policy_end_date', '>=', date('Y-m-d'))
            ->select('id', 'policy_number')
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Policies are here.',
            'data' => $policies,
        ]);
    }

    public function addDocument(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'document_type' => ['required', 'string'],
            'document_name' => ['required', 'string'],
            'upload_date' => ['required', 'string'],
            'expiry_date' => ['required', 'string'],
            'action_type' => ['required', 'string'],
            'action_date' => ['required', 'string'],
            'file' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $image = null;
        if ($request->hasFile('file')) {
            $uploadService = new FileUploadService();
            $image = $uploadService->userPhotoUpload($request->file);
        }

        $newData = [
            'document_type' => $request->document_type,
            'document_name' => $request->document_name,
            'upload_date' => $request->upload_date,
            'expiry_date' => $request->expiry_date,
            'action_type' => $request->action_type,
            'action_date' => $request->action_date,
            'file' => $image ?? '',
        ];

        $carExtra = $car->carExtra;
        if ($carExtra) {
            $documents = $carExtra->documents;
            $documents[] = $newData;
            $carExtra->update(['documents' => $documents]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Document added successfully.',
            'data' => $carExtra->documents,
        ]);
    }

    public function deleteDocument(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $documents = $car->carExtra->documents;
        unset($documents[$request->index]);
        $car->carExtra->documents = array_values($documents);
        $car->carExtra->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Document deleted successfully.',
            'data' => $car->carExtra->documents,
        ]);
    }

    public function addAvailability(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'day_of_week' => 'required',
            'pickup_hours_start' => 'required',
            'pickup_hours_end' => 'required',
            'return_hours_start' => 'required',
            'return_hours_end' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $newData = [
            'day_of_week' => $request->day_of_week,
            'pickup_hours_start' => $request->pickup_hours_start,
            'pickup_hours_end' => $request->pickup_hours_end,
            'return_hours_start' => $request->return_hours_start,
            'return_hours_end' => $request->return_hours_end,
        ];

        $car->availabilities()->create($newData);

        return response()->json([
            'status' => 'success',
            'message' => 'Availability added successfully.',
            'data' => $car->availabilities,
        ]);
    }

    public function deleteAvailability(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $car->availabilities()->where('id', $request->availability_id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Availability deleted successfully.',
            'data' => $car->availabilities,
        ]);
    }

    public function addBlackout(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'start_date_time' => ['required', 'date_format:Y-m-d H:i', 'after_or_equal:' . now()->format('Y-m-d H:i')],
            'end_date_time' => ['required', 'date_format:Y-m-d H:i', 'after_or_equal:' . now()->format('Y-m-d H:i')],
            'reason' => 'required',
            'hard_block' => 'required',
            'notes' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $newData = [
            'start_date_time' => $request->start_date_time,
            'end_date_time' => $request->end_date_time,
            'reason' => $request->reason,
            'hard_block' => $request->hard_block,
            'notes' => $request->notes,
        ];

        $car->blackouts()->create($newData);

        return response()->json([
            'status' => 'success',
            'message' => 'Blackout added successfully.',
            'data' => $car->blackouts,
        ]);
    }

    public function deleteBlackout(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $car->blackouts()->where('id', $request->blackout_id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Blackout deleted successfully.',
            'data' => $car->blackouts,
        ]);
    }

    public function addMot(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'test_date' => ['required'],
            'expiry_date' => ['required'],
            'result' => ['required'],
            'details' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $newData = [
            'test_date' => $request->test_date,
            'expiry_date' => $request->expiry_date,
            'result' => $request->result,
            'details' => $request->details,
        ];

        $carExtra = $car->carExtra;
        if ($carExtra) {
            $mots = $carExtra->mots;
            $mots[] = $newData;
            $carExtra->update(['mots' => $mots]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'MOT added successfully.',
            'data' => $carExtra->mots,
        ]);
    }

    public function addService(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'last_service_date' => ['required', 'date'],
            'next_service_date' => ['required', 'date', 'after:last_service_date'],
            'last_service_mileage' => ['required', 'numeric'],
            'next_service_mileage' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $newData = [
            'last_service_date' => $request->input('last_service_date'),
            'next_service_date' => $request->input('next_service_date'),
            'last_service_mileage' => $request->input('last_service_mileage'),
            'next_service_mileage' => $request->input('next_service_mileage'),
        ];

        $carExtra = $car->carExtra;
        if ($carExtra) {
            $services = $carExtra->service;
            $services[] = $newData;
            $carExtra->update(['service' => $services]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Service added successfully.',
            'data' => $carExtra->service,
        ]);
    }

    public function addDamageHistory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'reported_date' => ['required', 'string'],
            'incident_date' => ['required', 'string'],
            'insurance_reference_no' => ['required', 'string'],
            'total_claim_cost' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $newData = [
            'reported_date' => $request->input('reported_date'),
            'incident_date' => $request->input('incident_date'),
            'insurance_reference_no' => $request->input('insurance_reference_no'),
            'total_claim_cost' => $request->input('total_claim_cost'),
            'status' => $request->input('status'),
        ];

        $carExtra = $car->carExtra;
        if ($carExtra) {
            $damage_history = $carExtra->damage_history;
            $damage_history[] = $newData;
            $carExtra->update(['damage_history' => $damage_history]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Service added successfully.',
            'data' => $carExtra->damage_history,
        ]);
    }

    public function addRepair(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'booking_id' => ['required', 'string'],
            'booking_date' => ['required', 'string'],
            'date_time' => ['required', 'string'],
            'mileage_at_repair' => ['required', 'string'],
            'workshop_name' => ['required', 'string'],
            'repair_type' => ['required', 'string'],
            'total_cost' => ['required', 'string'],
            'vat' => ['required', 'string'],
            'invoice' => ['required', 'mimes:jpeg,png,jpg,pdf', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $file = null;
        if ($request->file('invoice')) {
            $uploadService = new FileUploadService();
            $file = $uploadService->userFileUpload($request->file('invoice'));
        }

        $newData = [
            'booking_id' => $request->input('booking_id'),
            'booking_date' => $request->input('booking_date'),
            'date_time' => $request->input('date_time'),
            'mileage_at_repair' => $request->input('mileage_at_repair'),
            'workshop_name' => $request->input('workshop_name'),
            'repair_type' => $request->input('repair_type'),
            'total_cost' => $request->input('total_cost'),
            'vat' => $request->input('vat'),
            'invoice' => $file ?? '',
        ];

        $carExtra = $car->carExtra;
        if ($carExtra) {
            $repairs = $carExtra->repairs;
            $repairs[] = $newData;
            $carExtra->update(['repairs' => $repairs]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Service added successfully.',
            'data' => $carExtra->repairs,
        ]);
    }

    public function storeChaufferData(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        switch ($request->input('type')) {
            case 'features1':
                $validator = Validator::make($request->all(), [
                    'chauffer_features1' => ['nullable', 'array'],
                    'chauffer_features1.*' => ['nullable', 'string'],
                ]);
                break;
            case 'features2':
                $validator = Validator::make($request->all(), [
                    'chauffer_features2' => ['nullable', 'array'],
                    'chauffer_features2.*' => ['nullable', 'string'],
                ]);
                break;
            case 'addons':
                $validator = Validator::make($request->all(), [
                    'chauffer_addons' => ['nullable', 'array'],
                    'chauffer_addons.*' => ['nullable', 'array'],
                    'chauffer_addons.*.name' => ['nullable', 'string'],
                    'chauffer_addons.*.price' => ['nullable', 'string'],
                ]);
                break;
            case 'terms':
                $validator = Validator::make($request->all(), [
                    'chauffer_terms' => ['nullable', 'array'],
                    'chauffer_terms.*' => ['nullable', 'string'],
                ]);
                break;
            case 'ch_pricing':
                $validator = Validator::make($request->all(), [
                    'hourly_rate' => ['required', 'numeric', 'min:0'],
                    'p2p_rate' => ['required', 'numeric', 'min:0'],
                    'airport_transfer_rate' => ['required', 'numeric', 'min:0'],
                    'long_transfer_rate' => ['required', 'numeric', 'min:0'],
                    'event_hire_rate' => ['required', 'numeric', 'min:0'],
                ]);
                break;
            case 'ch_driver':
                $validator = Validator::make($request->all(), [
                    'name' => ['nullable', 'string', 'max:20'],
                    'photo' => ['nullable', 'file', 'image', 'mimes:jpeg,jpg,png,gif', 'max:2048'],
                    'years_experience' => ['nullable', 'string', 'max:20'],
                    'special_skills' => ['nullable', 'string', 'max:20'],
                    'primary_language' => ['nullable', 'string', 'max:20'],
                    'additional_languages' => ['nullable', 'string', 'max:20'],
                    'area_expertise' => ['nullable', 'string', 'max:20'],
                    'tour_guide_experience' => ['nullable', 'string', 'max:20'],
                    'driving_licenses' => ['nullable', 'string', 'max:20'],
                    'certifications' => ['nullable', 'string', 'max:20'],
                    'customer_reviews' => ['nullable', 'string'],
                    'overall_rating' => ['nullable', 'string', 'max:20'],
                    'work_hours' => ['nullable', 'string'],
                    'days_off' => ['nullable', 'string', 'max:20'],
                    'phone_number' => ['nullable', 'string'],
                    'email_address' => ['nullable', 'email'],
                    'working_hours' => ['nullable', 'string'],
                    'driver_breaks' => ['nullable', 'string'],
                    'accommodation' => ['nullable', 'string'],
                    'food' => ['nullable', 'string'],
                    'toll_tax' => ['nullable', 'string'],
                    'dropoff_location' => ['nullable', 'string'],
                    'miscellaneous' => ['nullable', 'string'],
                ]);
                break;
        }

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        switch ($request->input('type')) {
            case 'features1':
                $car->update([
                    'chauffer_features1' => $request->input('chauffer_features1'),
                ]);
                break;
            case 'features2':
                $car->update([
                    'chauffer_features2' => $request->input('chauffer_features2'),
                ]);
                break;
            case 'addons':
                $car->update([
                    'chauffer_addons' => $request->input('chauffer_addons'),
                ]);
                break;
            case 'terms':
                $car->update([
                    'chauffer_terms' => $request->input('chauffer_terms'),
                ]);
                break;
            case 'ch_pricing':
                $car->update([
                    'hourly_rate' => $request->input('hourly_rate'),
                    'p2p_rate' => $request->input('p2p_rate'),
                    'airport_transfer_rate' => $request->input('airport_transfer_rate'),
                    'long_transfer_rate' => $request->input('long_transfer_rate'),
                    'event_hire_rate' => $request->input('event_hire_rate'),
                ]);
                break;
            case 'ch_driver':
                $file = null;
                if ($request->file('photo')) {
                    $uploadService = new FileUploadService();
                    $file = $uploadService->userFileUpload($request->file('photo'));
                }

                $car->update([
                    'driver' => [
                        'name' => $request->input('name', ''),
                        'photo' => $file,
                        'years_experience' => $request->input('years_experience', ''),
                        'special_skills' => $request->input('special_skills', ''),
                        'primary_language' => $request->input('primary_language', ''),
                        'additional_languages' => $request->input('additional_languages', ''),
                        'area_expertise' => $request->input('area_expertise'),
                        'tour_guide_experience' => $request->input('tour_guide_experience'),
                        'driving_licenses' => $request->input('driving_licenses'),
                        'certifications' => $request->input('certifications'),
                        'customer_reviews' => $request->input('customer_reviews'),
                        'overall_rating' => $request->input('overall_rating'),
                        'work_hours' => $request->input('work_hours'),
                        'days_off' => $request->input('days_off'),
                        'phone_number' => $request->input('phone_number'),
                        'email_address' => $request->input('email_address'),
                        'working_hours' => $request->input('working_hours'),
                        'driver_breaks' => $request->input('driver_breaks'),
                        'accommodation' => $request->input('accommodation'),
                        'food' => $request->input('food'),
                        'toll_tax' => $request->input('toll_tax'),
                        'dropoff_location' => $request->input('dropoff_location'),
                        'miscellaneous' => $request->input('miscellaneous'),
                    ],
                ]);
                break;
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Car updated successfully.',
        ]);
    }

    public function storePrivateHireData(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found.',
            ]);
        }

        $validator = Validator::make($request->all(), [
            'private_hire' => ['nullable', 'boolean'],
            'licensing_authority' => ['nullable', 'string'],
            'phv_plate_number' => ['nullable', 'string'],
            'phv_expiry_date' => ['nullable', 'string'],
            'hr_insurance_expiry' => ['nullable', 'string'],
            'plate_certificate_input' => ['nullable', 'file'],
            'hr_insurance_proof_input' => ['nullable', 'file'],

            'short_term' => 'nullable|boolean',
            'long_term' => 'nullable|boolean',
            'rent_to_buy' => 'nullable|boolean',

            'short_term_minimum_term' => 'nullable|string',
            'short_term_maximum_term' => 'nullable|string',
            'short_term_pricing_cadence' => 'nullable|string',
            'short_term_weekly_price_wo_ins' => 'nullable|numeric',
            'short_term_weekly_price_w_ins' => 'nullable|numeric',
            'short_term_maintenance_included' => 'nullable|boolean',
            'short_term_deposit' => 'nullable|numeric',
            'short_term_excess_liability' => 'nullable|numeric',
            'short_term_early_return_fee' => 'nullable|numeric',
            'short_term_notice_period_to_return' => 'nullable|string',

            'long_term_billing_cycle' => 'nullable|string',
            'long_term_default_deposit' => 'nullable|numeric',
            'long_term_term_options' => 'nullable|array',
            'long_term_prices.3m.price_wo_ins' => 'nullable|numeric',
            'long_term_prices.3m.price_w_ins' => 'nullable|numeric',
            'long_term_prices.3m.maintenance_included' => 'nullable|boolean',
            'long_term_prices.3m.maintenance_type' => 'nullable|string',
            'long_term_prices.3m.maintenance_price' => 'nullable|numeric',
            'long_term_prices.3m.mileage' => 'nullable|numeric',
            'long_term_prices.3m.excess_rate' => 'nullable|numeric',
            'long_term_prices.6m.price_wo_ins' => 'nullable|numeric',
            'long_term_prices.6m.price_w_ins' => 'nullable|numeric',
            'long_term_prices.6m.maintenance_included' => 'nullable|boolean',
            'long_term_prices.6m.maintenance_type' => 'nullable|string',
            'long_term_prices.6m.maintenance_price' => 'nullable|numeric',
            'long_term_prices.6m.mileage' => 'nullable|numeric',
            'long_term_prices.6m.excess_rate' => 'nullable|numeric',
            'long_term_prices.9m.price_wo_ins' => 'nullable|numeric',
            'long_term_prices.9m.price_w_ins' => 'nullable|numeric',
            'long_term_prices.9m.maintenance_included' => 'nullable|boolean',
            'long_term_prices.9m.maintenance_type' => 'nullable|string',
            'long_term_prices.9m.maintenance_price' => 'nullable|numeric',
            'long_term_prices.9m.mileage' => 'nullable|numeric',
            'long_term_prices.9m.excess_rate' => 'nullable|numeric',
            'long_term_prices.12m.price_wo_ins' => 'nullable|numeric',
            'long_term_prices.12m.price_w_ins' => 'nullable|numeric',
            'long_term_prices.12m.maintenance_included' => 'nullable|boolean',
            'long_term_prices.12m.maintenance_type' => 'nullable|string',
            'long_term_prices.12m.maintenance_price' => 'nullable|numeric',
            'long_term_prices.12m.mileage' => 'nullable|numeric',
            'long_term_prices.12m.excess_rate' => 'nullable|numeric',
            'long_term_prices.18m.price_wo_ins' => 'nullable|numeric',
            'long_term_prices.18m.price_w_ins' => 'nullable|numeric',
            'long_term_prices.18m.maintenance_included' => 'nullable|boolean',
            'long_term_prices.18m.maintenance_type' => 'nullable|string',
            'long_term_prices.18m.maintenance_price' => 'nullable|numeric',
            'long_term_prices.18m.mileage' => 'nullable|numeric',
            'long_term_prices.18m.excess_rate' => 'nullable|numeric',
            'long_term_excess_liability' => 'nullable|numeric',
            'long_term_vehicle_swap_allowed' => 'nullable|boolean',
            'long_term_early_termination_rules' => 'nullable|string',

            'rent_to_buy_term' => 'nullable|numeric',
            'rent_to_buy_billing_cycle' => 'nullable|string',
            'rent_to_buy_price_per_cycle' => 'nullable|numeric',
            'rent_to_buy_deposit_amount' => 'nullable|numeric',
            'rent_to_buy_balloon_payment' => 'nullable|numeric',
            'rent_to_buy_payment_break_weeks_year' => 'nullable|string',
            'rent_to_buy_mileage_allowance_per_cycle' => 'nullable|numeric',
            'rent_to_buy_excess_mileage_rate' => 'nullable|numeric',
            'rent_to_buy_insurance_included' => 'nullable|boolean',
            'rent_to_buy_maintenance_included' => 'nullable|boolean',
            'rent_to_buy_ev_incentive_included' => 'nullable|boolean',
            'rent_to_buy_ownership_transfer_notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $plate_certificate = $car->plate_certificate;
        $uploadService = new FileUploadService();
        if($request->hasFile('plate_certificate')){
            $file = $uploadService->userFileUpload($request->file('plate_certificate'));
            $plate_certificate = $file;
        }

        $hr_insurance_proof = $car->hr_insurance_proof;
        if($request->hasFile('hr_insurance_proof')){
            $file = $uploadService->userFileUpload($request->file('hr_insurance_proof'));
            $hr_insurance_proof = $file;
        }

        $car->update([
            'private_hire' => $request->input('private_hire', 0),
            'licensing_authority' => $request->input('licensing_authority', ''),
            'phv_plate_number' => $request->input('phv_plate_number', ''),
            'phv_expiry_date' => $request->input('phv_expiry_date', ''),
            'hr_insurance_expiry' => $request->input('hr_insurance_expiry', ''),
            'plate_certificate_input' => $plate_certificate,
            'hr_insurance_proof_input' => $hr_insurance_proof,

            'short_term' => $request->input('short_term', 0),
            'long_term' => $request->input('long_term', 0),
            'rent_to_buy' => $request->input('rent_to_buy', 0),

            'short_term_minimum_term' => $request->input('short_term_minimum_term'),
            'short_term_maximum_term' => $request->input('short_term_maximum_term'),
            'short_term_pricing_cadence' => $request->input('short_term_pricing_cadence'),
            'short_term_weekly_price_wo_ins' => $request->input('short_term_weekly_price_wo_ins'),
            'short_term_weekly_price_w_ins' => $request->input('short_term_weekly_price_w_ins'),
            'short_term_maintenance_included' => $request->input('short_term_maintenance_included', 0),
            'short_term_deposit' => $request->input('short_term_deposit'),
            'short_term_excess_liability' => $request->input('short_term_excess_liability'),
            'short_term_early_return_fee' => $request->input('short_term_early_return_fee'),
            'short_term_notice_period_to_return' => $request->input('short_term_notice_period_to_return'),

            'long_term_billing_cycle' => $request->input('long_term_billing_cycle'),
            'long_term_default_deposit' => $request->input('long_term_default_deposit'),
            'long_term_term_options' => $request->input('long_term_term_options'),
            'long_term_prices' => $request->input('long_term_prices', []),
            'long_term_excess_liability' => $request->input('long_term_excess_liability'),
            'long_term_vehicle_swap_allowed' => $request->input('long_term_vehicle_swap_allowed', 0),
            'long_term_early_termination_rules' => $request->input('long_term_early_termination_rules'),

            'rent_to_buy_term' => $request->input('rent_to_buy_term'),
            'rent_to_buy_billing_cycle' => $request->input('rent_to_buy_billing_cycle'),
            'rent_to_buy_price_per_cycle' => $request->input('rent_to_buy_price_per_cycle'),
            'rent_to_buy_deposit_amount' => $request->input('rent_to_buy_deposit_amount'),
            'rent_to_buy_balloon_payment' => $request->input('rent_to_buy_balloon_payment'),
            'rent_to_buy_payment_break_weeks_year' => $request->input('rent_to_buy_payment_break_weeks_year'),
            'rent_to_buy_mileage_allowance_per_cycle' => $request->input('rent_to_buy_mileage_allowance_per_cycle'),
            'rent_to_buy_excess_mileage_rate' => $request->input('rent_to_buy_excess_mileage_rate'),
            'rent_to_buy_insurance_included' => $request->input('rent_to_buy_insurance_included',0),
            'rent_to_buy_maintenance_included' => $request->input('rent_to_buy_maintenance_included', 0),
            'rent_to_buy_ev_incentive_included' => $request->input('rent_to_buy_ev_incentive_included', 0),
            'rent_to_buy_ownership_transfer_notes' => $request->input('rent_to_buy_ownership_transfer_notes'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Car updated successfully.',
        ]);
    }
}
